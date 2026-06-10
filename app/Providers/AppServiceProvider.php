<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        if (config('database.default') === 'sqlite') {
            $dbPath = config('database.connections.sqlite.database');
            
            // Jika database diatur ke folder /tmp (serverless environment seperti Vercel)
            if (str_starts_with($dbPath, '/tmp/')) {
                if (!file_exists($dbPath)) {
                    // Buat folder jika belum ada
                    @mkdir(dirname($dbPath), 0755, true);
                    touch($dbPath);
                    
                    // Jalankan migrasi dan seeder secara dinamis pada runtime
                    try {
                        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
                        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);
                    } catch (\Exception $e) {
                        logger()->error("Serverless SQLite Init Failed: " . $e->getMessage());
                    }
                }
            }
        }
    }
}
