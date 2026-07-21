<?php

// Prepare writable directories in /tmp for Vercel Serverless environment
$tmpPath = '/tmp';
$storagePath = $tmpPath . '/storage';
$directories = [
    $storagePath . '/framework/views',
    $storagePath . '/framework/cache',
    $storagePath . '/framework/sessions',
    $storagePath . '/logs',
    $tmpPath . '/bootstrap/cache',
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Set environment variables dynamically for Serverless environment
putenv('VIEW_COMPILED_PATH=' . $storagePath . '/framework/views');
putenv('CACHE_STORE=array');
putenv('SESSION_DRIVER=cookie');
putenv('LOG_CHANNEL=stderr');

// Copy sqlite database to /tmp if exists
$dbPath = __DIR__ . '/../database/database.sqlite';
$tmpDbPath = $tmpPath . '/database.sqlite';

if (file_exists($dbPath)) {
    if (!file_exists($tmpDbPath) || filesize($tmpDbPath) === 0) {
        @copy($dbPath, $tmpDbPath);
    }
    putenv('DB_CONNECTION=sqlite');
    putenv('DB_DATABASE=' . $tmpDbPath);
    $_ENV['DB_CONNECTION'] = 'sqlite';
    $_ENV['DB_DATABASE'] = $tmpDbPath;
}

// Forward request to Laravel's public/index.php
require __DIR__ . '/../public/index.php';
