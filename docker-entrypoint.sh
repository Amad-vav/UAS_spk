#!/bin/sh
set -e

# If RUN_MIGRATIONS env var is set to "true", run migrations and seeders once.
if [ "${RUN_MIGRATIONS:-false}" = "true" ]; then
  echo "RUN_MIGRATIONS=true -> running migrations and seeders"
  php artisan migrate --force || echo "migrate failed"
  php artisan db:seed --force || echo "db:seed failed"
fi

# Execute the main container command (apache)
exec "${@:-/usr/sbin/apache2ctl -D FOREGROUND}"
