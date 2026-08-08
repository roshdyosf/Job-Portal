#!/bin/sh
set -e

if [ ! -f database/database.sqlite ]; then
  touch database/database.sqlite
fi

chown -R www-data:www-data storage bootstrap/cache database

php artisan migrate --force
php artisan config:cache

php-fpm &
nginx -g 'daemon off;'
