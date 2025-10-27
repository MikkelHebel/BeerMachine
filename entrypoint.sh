#!/usr/bin/env bash
set -e

cd /var/www/html

# Check if .env is missing
if [ ! -f .env ]; then
	echo "[INFO] .env missing creating .env file..."
	cp .env.example .env
	chmod 666 .env
fi

# Install dependencies if missing
if [ ! -f vendor/autoload.php ]; then
	echo "[INFO] Dependencies missing installing them now..."
	composer install --no-interaction --optimize-autoloader
fi

# Generate app key if missing
if ! grep -q "^APP_KEY=" .env || [ -z "$(grep '^APP_KEY=' .env | cut -d'=' -f2)" ]; then
	echo "[INFO] App key missing, generating app key..."
	php artisan key:generate
fi

# Run migrations if database is empty
echo "[INFO] Running database migrations..."
php artisan migrate:fresh # 

exec php artisan serve --host=0.0.0.0 --port=8000
