#!/bin/sh
set -e

mkdir -p /var/www/html/data /var/www/html/imgs
chown -R www-data:www-data /var/www/html/data /var/www/html/imgs
chmod -R u+rwX,g+rwX /var/www/html/data /var/www/html/imgs

exec "$@"
