#!/bin/bash
# Generate .env from environment variables
cat > /var/www/html/.env << ENVEOF
APP_NAME=${APP_NAME:-MobiBit}
APP_ENV=${APP_ENV:-production}
APP_KEY=${APP_KEY}
APP_DEBUG=${APP_DEBUG:-false}
APP_URL=${APP_URL:-https://mobibit-kewv.onrender.com}
LOG_CHANNEL=stack
LOG_LEVEL=debug
DB_CONNECTION=${DB_CONNECTION:-pgsql}
DATABASE_URL=${DATABASE_URL}
SESSION_DRIVER=${SESSION_DRIVER:-cookie}
CACHE_DRIVER=file
FILESYSTEM_DISK=local
ENVEOF

php artisan config:clear
apache2-foreground
