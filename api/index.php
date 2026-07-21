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

// Copy sqlite database to /tmp if exists
$dbPath = __DIR__ . '/../database/database.sqlite';
$tmpDbPath = $tmpPath . '/database.sqlite';

if (file_exists($dbPath) && !file_exists($tmpDbPath)) {
    @copy($dbPath, $tmpDbPath);
}

// Forward request to Laravel's public/index.php
require __DIR__ . '/../public/index.php';
