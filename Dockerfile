FROM node:20 AS node-build

WORKDIR /var/www

COPY package*.json vite.config.js ./
COPY resources ./resources
COPY public ./public

RUN npm install
RUN npm run build

FROM php:8.2-fpm AS app

RUN apt-get update && apt-get install -y \
    git \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    nginx \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo_mysql pdo_sqlite bcmath mbstring zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY composer.json composer.lock* ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

COPY . ./
COPY --from=node-build /var/www/public/build ./public/build

RUN touch database/database.sqlite \
    && chown -R www-data:www-data storage bootstrap/cache database

COPY docker/nginx.conf /etc/nginx/conf.d/default.conf
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 80
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
