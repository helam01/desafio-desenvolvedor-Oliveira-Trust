#!/bin/bash

cd /var/www/html
composer install --ignore-platform-reqs
php artisan key:generate
php artisan migrate --seed
npm install
npm run build
npm run dev

echo "Local container are ready to use"
