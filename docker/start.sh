#!/bin/sh
set -eu

APP_PORT="${PORT:-8080}"

echo "Starting MyEkskul on port ${APP_PORT}"

mkdir -p database
mkdir -p public/assets
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p bootstrap/cache

if [ -d /data ]; then
    mkdir -p /data/storage
    mkdir -p /data/assets/ekskul
    mkdir -p /data/assets/dokumentasi
    mkdir -p /data/dokumentasi

    if [ -d storage/app/public ] && [ ! -L storage/app/public ]; then
        cp -an storage/app/public/. /data/storage/ 2>/dev/null || true
        rm -rf storage/app/public
    fi

    if [ ! -e storage/app/public ]; then
        ln -s /data/storage storage/app/public
    fi

    if [ -d public/assets/ekskul ] && [ ! -L public/assets/ekskul ]; then
        cp -an public/assets/ekskul/. /data/assets/ekskul/ 2>/dev/null || true
        rm -rf public/assets/ekskul
    fi

    if [ ! -e public/assets/ekskul ]; then
        ln -s /data/assets/ekskul public/assets/ekskul
    fi

    if [ -d public/assets/dokumentasi ] && [ ! -L public/assets/dokumentasi ]; then
        cp -an public/assets/dokumentasi/. /data/assets/dokumentasi/ 2>/dev/null || true
        rm -rf public/assets/dokumentasi
    fi

    if [ ! -e public/assets/dokumentasi ]; then
        ln -s /data/assets/dokumentasi public/assets/dokumentasi
    fi

    if [ -d public/dokumentasi ] && [ ! -L public/dokumentasi ]; then
        cp -an public/dokumentasi/. /data/dokumentasi/ 2>/dev/null || true
        rm -rf public/dokumentasi
    fi

    if [ ! -e public/dokumentasi ]; then
        ln -s /data/dokumentasi public/dokumentasi
    fi

    chmod -R 775 /data/storage /data/assets /data/dokumentasi || true
fi

if [ "${DB_CONNECTION:-sqlite}" = "sqlite" ]; then
    SQLITE_PATH="${DB_DATABASE:-database/database.sqlite}"
    SQLITE_DIR="$(dirname "${SQLITE_PATH}")"

    mkdir -p "${SQLITE_DIR}"

    if [ "${REFRESH_SQLITE_FROM_REPO:-false}" = "true" ] && [ -f database/database.sqlite ]; then
        echo "Refreshing SQLite database from repository to ${SQLITE_PATH}"
        cp database/database.sqlite "${SQLITE_PATH}"
    fi

    if [ ! -f "${SQLITE_PATH}" ] && [ -f database/database.sqlite ]; then
        echo "Copying initial SQLite database to ${SQLITE_PATH}"
        cp database/database.sqlite "${SQLITE_PATH}"
    fi

    touch "${SQLITE_PATH}"
    chmod -R 775 "${SQLITE_DIR}" database || true
fi

chmod -R 775 storage bootstrap/cache || true

php artisan config:clear || true
php artisan cache:clear || true
php artisan route:clear || true
php artisan view:clear || true
php artisan storage:link || true

php artisan migrate --force

if php -r 'require "vendor/autoload.php"; $app = require "bootstrap/app.php"; $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap(); exit(App\Models\User::count() > 0 ? 0 : 1);' >/dev/null 2>&1; then
    echo "Database already seeded"
else
    echo "Seeding initial database"
    php artisan db:seed --force
fi

echo "Laravel is listening on 0.0.0.0:${APP_PORT}"
exec php -S "0.0.0.0:${APP_PORT}" -t public public/router.php
