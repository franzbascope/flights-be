FROM php:8.0.2-fpm

# Install system functions
RUN apt-get update -y && apt-get install -y openssl zip unzip git

# Install PHP extensions
# RUN docker-php-ext-install pdo_mysql exif pcntl gd
RUN docker-php-ext-install pdo pdo_mysql

# Get latest Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

COPY composer.json composer.json
COPY composer.lock composer.lock

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

COPY . .
