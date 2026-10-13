<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ImportSupabaseData extends Command
{
    protected $signature = 'portfolio:import-supabase 
                            {--file= : Specific backup file path}
                            {--connection=pgsql : Database connection to use (default: pgsql)}
                            {--admin-email= : Email for default admin user}
                            {--admin-password= : Password for default admin user}';

    protected $description = 'Import portfolio data into Supabase PostgreSQL, sync sequences, and ensure admin user';

    public function handle(): int
    {
        $connectionName = $this->option('connection');
        $this->info("Importing portfolio data into connection [{$connectionName}]...");

        $backupDir = database_path('backup');
        $filePath = $this->option('file');

        if (!$filePath) {
            $files = File::glob($backupDir . '/portfolio_backup_*.json');
            if (empty($files)) {
                $this->error('No backup files found in ' . $backupDir);
                return Command::FAILURE;
            }
            rsort($files);
            $filePath = $files[0];
        }

        if (!File::exists($filePath)) {
            $this->error("Backup file not found: {$filePath}");
            return Command::FAILURE;
        }

        $this->line("Using backup file: {$filePath}");
        $data = json_decode(File::get($filePath), true);

        if (!isset($data['tables'])) {
            $this->error('Invalid backup file format.');
            return Command::FAILURE;
        }

        $targetDb = DB::connection($connectionName);

        // Import tables in logical order
        $tableOrder = [
            'educations',
            'skills',
            'projects',
            'coding_projects',
            'project_details',
            'posts',
            'mock_apis',
            'testimonials',
            'guest_books',
        ];

        foreach ($tableOrder as $table) {
            if (!isset($data['tables'][$table]) || empty($data['tables'][$table])) {
                continue;
            }

            $rows = $data['tables'][$table];
            $count = 0;

            foreach ($rows as $row) {
                // Sanitize corrupted em-dashes and characters to comply with Dapur R-02
                foreach ($row as $k => $v) {
                    if (is_string($v)) {
                        $row[$k] = str_replace(['ÔÇö', '—'], ':', $v);
                    }
                }

                // Explicit boolean casting for PostgreSQL compatibility
                $booleanFields = ['is_visible', 'is_approved', 'is_published', 'is_active', 'is_admin'];
                foreach ($booleanFields as $field) {
                    if (array_key_exists($field, $row)) {
                        if ($targetDb->getDriverName() === 'pgsql') {
                            $row[$field] = !empty($row[$field]) ? DB::raw('true') : DB::raw('false');
                        } else {
                            $row[$field] = (bool) $row[$field];
                        }
                    }
                }

                $targetDb->table($table)->updateOrInsert(
                    ['id' => $row['id']],
                    $row
                );
                $count++;
            }

            $this->line("  ✓ {$table}: imported {$count} rows");

            // Reset PostgreSQL sequence if applicable
            if ($targetDb->getDriverName() === 'pgsql') {
                try {
                    $targetDb->statement("SELECT setval(pg_get_serial_sequence('{$table}', 'id'), COALESCE(MAX(id), 1)) FROM \"{$table}\";");
                } catch (\Throwable $e) {
                    // Sequence might not exist or be named differently, report safely
                    report($e);
                }
            }
        }

        // Ensure Admin user
        $adminEmail = $this->option('admin-email') ?: env('ADMIN_DEFAULT_EMAIL', 'admin@raffa.my.id');
        $adminPassword = $this->option('admin-password') ?: env('ADMIN_DEFAULT_PASSWORD', 'AdminRaffa2026!');

        $existingAdmin = $targetDb->getDriverName() === 'pgsql'
            ? $targetDb->table('users')->whereRaw('"is_admin" = true')->first()
            : $targetDb->table('users')->where('is_admin', true)->first();

        if (!$existingAdmin) {
            $adminId = $targetDb->table('users')->insertGetId([
                'name' => 'Administrator',
                'email' => $adminEmail,
                'password' => Hash::make($adminPassword),
                'is_admin' => $targetDb->getDriverName() === 'pgsql' ? DB::raw('true') : true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $this->info("  ✓ Created administrator account [{$adminEmail}].");
            $this->warn("    Important: Change this password immediately after first login!");

            if ($targetDb->getDriverName() === 'pgsql') {
                try {
                    $targetDb->statement("SELECT setval(pg_get_serial_sequence('users', 'id'), COALESCE(MAX(id), 1)) FROM \"users\";");
                } catch (\Throwable $e) {
                    report($e);
                }
            }
        } else {
            $this->line("  ✓ Administrator account already exists: {$existingAdmin->email}");
        }

        $this->info('Supabase data import and sequence sync completed successfully.');
        return Command::SUCCESS;
    }
}
