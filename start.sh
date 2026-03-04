#!/bin/sh

# Ensure storage directories are properly configured
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs

chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# Clear and cache configurations via artisan
php artisan optimize:clear

# Wait for database connection and run schema migrations if they haven't been run yet
php artisan migrate --force

# Start PHP-FPM in background
php-fpm -D

# Start NGINX in foreground
nginx -g "daemon off;"
