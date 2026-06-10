#!/usr/bin/env bash
set -e

if [ ! -f .env ]; then
  cp .env.example .env
fi

composer install --no-dev --optimize-autoloader
php artisan key:generate --force
php artisan migrate --force || true
php artisan db:seed --force || true
php artisan serve --host 0.0.0.0 --port 8080
