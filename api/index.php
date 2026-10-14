<?php

$tmpPath = '/tmp';
$storagePath = $tmpPath.'/storage';
$directories = [
    $storagePath.'/framework/views',
    $storagePath.'/framework/cache/data',
    $storagePath.'/framework/sessions',
    $storagePath.'/logs',
    $tmpPath.'/bootstrap/cache',
];

foreach ($directories as $dir) {
    if (! is_dir($dir) && ! mkdir($dir, 0755, true) && ! is_dir($dir)) {
        throw new RuntimeException("Unable to prepare writable directory: {$dir}");
    }
}

// Force storage path to writable /tmp
putenv("LARAVEL_STORAGE_PATH={$storagePath}");
$_ENV['LARAVEL_STORAGE_PATH'] = $storagePath;
$_SERVER['LARAVEL_STORAGE_PATH'] = $storagePath;

putenv("VIEW_COMPILED_PATH={$storagePath}/framework/views");
$_ENV['VIEW_COMPILED_PATH'] = $storagePath.'/framework/views';
$_SERVER['VIEW_COMPILED_PATH'] = $storagePath.'/framework/views';

putenv("LOG_CHANNEL=stderr");
$_ENV['LOG_CHANNEL'] = 'stderr';
$_SERVER['LOG_CHANNEL'] = 'stderr';

// If session driver is file or unset, default to cookie for serverless
if (getenv('SESSION_DRIVER') === 'file' || getenv('SESSION_DRIVER') === false) {
    putenv('SESSION_DRIVER=cookie');
    $_ENV['SESSION_DRIVER'] = 'cookie';
    $_SERVER['SESSION_DRIVER'] = 'cookie';
}

foreach ([
    'CACHE_STORE' => 'array',
    'APP_CONFIG_CACHE' => $tmpPath.'/bootstrap/cache/config.php',
    'APP_EVENTS_CACHE' => $tmpPath.'/bootstrap/cache/events.php',
    'APP_PACKAGES_CACHE' => $tmpPath.'/bootstrap/cache/packages.php',
    'APP_ROUTES_CACHE' => $tmpPath.'/bootstrap/cache/routes.php',
    'APP_SERVICES_CACHE' => $tmpPath.'/bootstrap/cache/services.php',
] as $key => $value) {
    if (getenv($key) === false) {
        putenv("{$key}={$value}");
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }
}

require __DIR__.'/../public/index.php';
