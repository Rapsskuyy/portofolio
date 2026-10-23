<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use JsonException;
use RuntimeException;

class ImportSupabaseData extends Command
{
    protected $signature = 'portfolio:import-supabase
                            {--file= : Specific backup file path}
                            {--connection=pgsql : Target database connection}
                            {--force : Confirm that the target database is the intended import target}';

    protected $description = 'Import portfolio content into a migrated Supabase PostgreSQL database';

    public function handle(): int
    {
        if (! $this->option('force')) {
            $this->error('Import stopped. Re-run with --force after confirming the target Supabase database.');

            return Command::FAILURE;
        }

        $filePath = $this->resolveBackupPath();
        if ($filePath === null) {
            return Command::FAILURE;
        }

        try {
            $data = json_decode(File::get($filePath), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            $this->error('Backup file is not valid JSON: '.$exception->getMessage());

            return Command::FAILURE;
        }

        if (! is_array($data) || ! isset($data['tables']) || ! is_array($data['tables'])) {
            $this->error('Invalid backup file format. Expected a tables object.');

            return Command::FAILURE;
        }

        $connectionName = $this->option('connection');
        $targetDb = DB::connection($connectionName);

        try {
            $targetDb->getPdo();
        } catch (\Throwable $exception) {
            $this->error("Unable to connect to database connection [{$connectionName}].");
            report($exception);

            return Command::FAILURE;
        }

        $this->line("Importing portfolio content into connection [{$connectionName}] from {$filePath}...");

        $tables = [
            'educations',
            'skills',
            'projects',
            'coding_projects',
            'project_details',
            'posts',
            'testimonials',
            'guest_books',
        ];

        try {
            $importedTables = $targetDb->transaction(function () use ($data, $tables, $targetDb): array {
                $importedTables = [];

                foreach ($tables as $table) {
                    $rows = $data['tables'][$table] ?? [];
                    if ($rows === []) {
                        continue;
                    }

                    if (! is_array($rows)) {
                        throw new RuntimeException("Invalid row collection for [{$table}].");
                    }

                    foreach ($rows as $row) {
                        if (! is_array($row) || ! array_key_exists('id', $row)) {
                            throw new RuntimeException("Every [{$table}] row must include an id.");
                        }

                        foreach (['is_visible', 'is_approved', 'is_published', 'is_active'] as $field) {
                            if (array_key_exists($field, $row)) {
                                $value = filter_var($row[$field], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

                                if ($value === null) {
                                    throw new RuntimeException("Invalid boolean value for [{$table}.{$field}].");
                                }

                                $row[$field] = $value;
                            }
                        }

                        $targetDb->table($table)->updateOrInsert(['id' => $row['id']], $row);
                    }

                    $importedTables[] = $table;
                    $this->line('  Imported '.count($rows)." row(s) into {$table}.");
                }

                return $importedTables;
            });

            if ($targetDb->getDriverName() === 'pgsql') {
                foreach ($importedTables as $table) {
                    $this->syncSequence($targetDb, $table);
                }
            }
        } catch (\Throwable $exception) {
            $this->error('Import failed. Database changes were rolled back.');
            report($exception);

            return Command::FAILURE;
        }

        $this->info('Portfolio import completed. Create the admin account separately with php artisan admin:create.');

        return Command::SUCCESS;
    }

    private function resolveBackupPath(): ?string
    {
        $filePath = $this->option('file');

        if (! $filePath) {
            $files = File::glob(database_path('backup/portfolio_backup_*.json'));
            rsort($files);
            $filePath = $files[0] ?? null;
        }

        if (! $filePath || ! File::exists($filePath)) {
            $this->error('No portfolio backup file was found. Run portfolio:export-data first or pass --file.');

            return null;
        }

        return $filePath;
    }

    private function syncSequence(Connection $connection, string $table): void
    {
        $connection->statement("SELECT setval(pg_get_serial_sequence('{$table}', 'id'), COALESCE(MAX(id), 1), true) FROM \"{$table}\"");
    }
}
