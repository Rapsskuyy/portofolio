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

foreach ([
    'VIEW_COMPILED_PATH' => $storagePath.'/framework/views',
    'CACHE_STORE' => 'array',
    'SESSION_DRIVER' => 'cookie',
    'LOG_CHANNEL' => 'stderr',
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
