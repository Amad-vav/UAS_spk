#!/usr/bin/env bash
# exit on error
set -o errexit

# 1. Install dependensi Composer
composer install --no-dev --optimize-autoloader

# 2. Buat file database SQLite kosong jika belum ada
touch database/database.sqlite

# 3. Jalankan migrasi dan seeder database secara otomatis
php artisan migrate --force
php artisan db:seed --force

# 4. Optimasi cache Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache
