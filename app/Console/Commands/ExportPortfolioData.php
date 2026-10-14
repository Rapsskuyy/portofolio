<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ExportPortfolioData extends Command
{
    protected $signature = 'portfolio:export-data {--output= : Custom file path for the backup}';

    protected $description = 'Backup current portfolio data and image inventory to JSON before migrating to Supabase';

    public function handle(): int
    {
        $this->info('Starting portfolio data export...');

        $tables = [
            'educations',
            'skills',
            'projects',
            'coding_projects',
            'project_details',
            'posts',
            'mock_apis',
            'api_endpoints',
            'testimonials',
            'guest_books',
        ];

        $exportData = [
            'exported_at' => now()->toIso8601String(),
            'tables' => [],
        ];

        foreach ($tables as $table) {
            if (DB::getSchemaBuilder()->hasTable($table)) {
                $rows = DB::table($table)->get()->map(function ($row) {
                    return (array) $row;
                })->toArray();
                $exportData['tables'][$table] = $rows;
                $this->line("  - {$table}: ".count($rows).' rows');
            }
        }

        $backupDir = database_path('backup');
        if (! File::isDirectory($backupDir)) {
            File::makeDirectory($backupDir, 0755, true);
        }

        $filename = $this->option('output') ?: $backupDir.'/portfolio_backup_'.date('Ymd_His').'.json';
        File::put($filename, json_encode($exportData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));

        $this->info("Backup successfully written to: {$filename}");

        return Command::SUCCESS;
    }
}
