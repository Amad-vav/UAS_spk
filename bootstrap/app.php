<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );
    })->create();

// Override storage path for serverless environment (Vercel)
// Cek apakah running di Vercel atau environment serverless
if (getenv('VERCEL') || (getenv('DB_DATABASE') && str_starts_with(getenv('DB_DATABASE'), '/tmp/'))) {
    $app->useStoragePath('/tmp/storage');
}

return $app;
