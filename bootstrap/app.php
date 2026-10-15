<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(at: '*');
        $middleware->validateCsrfTokens(except: [
            'public-api/testimonials',
            'public-api/guestbook',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->reportable(function (\Throwable $e) {
            error_log('[APP ERROR] ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine());
        });
    })->create();

if (isset($_ENV['VERCEL']) || isset($_SERVER['VERCEL']) || (! empty($_ENV['LARAVEL_STORAGE_PATH']))) {
    $storagePath = $_ENV['LARAVEL_STORAGE_PATH'] ?? '/tmp/storage';
    $app->useStoragePath($storagePath);
}

return $app;
