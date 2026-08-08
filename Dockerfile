# Stage 1: Build Frontend Assets
FROM node:20-alpine AS node-build
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# Stage 2: PHP + Nginx Environment
FROM php:8.4-fpm

# Install Extension Installer (Prevents missing C-library build errors)
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

# Install Nginx, Git, Zip tools + PHP Extensions automatically
RUN apt-get update && apt-get install -y nginx git zip unzip \
    && install-php-extensions pdo_mysql pdo_sqlite bcmath mbstring zip gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy Project Files
COPY . /var/www

# Copy Compiled Assets from Stage 1
COPY --from=node-build /app/public/build /var/www/public/build

# Install PHP Dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Set Permissions
RUN touch /var/www/database/database.sqlite \
    && chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache /var/www/database \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache /var/www/database

# Setup Nginx & Entrypoint
COPY docker/nginx.conf /etc/nginx/conf.d/default.conf
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
