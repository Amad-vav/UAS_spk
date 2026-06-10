<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Hanya jalankan logika ini di environment serverless (Vercel)
        $isServerless = getenv('VERCEL') || str_starts_with(getenv('DB_DATABASE') ?: '', '/tmp/');

        if (!$isServerless) {
            return;
        }

        // Pastikan DB path sudah di-set ke /tmp
        $dbPath = config('database.connections.sqlite.database');
        if (!$dbPath || !str_starts_with($dbPath, '/tmp/')) {
            return;
        }

        // Buat direktori dan file database jika belum ada
        $dbDir = dirname($dbPath);
        if (!is_dir($dbDir)) {
            @mkdir($dbDir, 0755, true);
        }

        if (!file_exists($dbPath)) {
            // Buat file database baru
            @touch($dbPath);

            // Jalankan migrasi dan seeder
            try {
                Artisan::call('migrate', ['--force' => true]);
                Artisan::call('db:seed', ['--force' => true]);
            } catch (\Exception $e) {
                logger()->error('Serverless SQLite Init Failed: ' . $e->getMessage());
            }
        }
    }
}
