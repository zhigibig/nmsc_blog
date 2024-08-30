FROM php:8.3-fpm-alpine

RUN apk --no-cache add \
    git \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    libzip-dev \
    zip \
    unzip \
    oniguruma-dev \
    postgresql-dev \
    mysql-client \
    icu-dev \
    libxml2-dev

RUN docker-php-ext-configure gd --with-jpeg --with-webp \
    && docker-php-ext-install \
        gd \
        mbstring \
        pdo_mysql \
        pdo_pgsql \
        zip \
        intl \
        bcmath \
        pcntl \
        soap

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apk add --no-cache nodejs npm

RUN apk add --no-cache bash

WORKDIR /var/www/html

COPY . /var/www/html

CMD ["chown", "-R", "www-data:www-data", "/var/www/storage", "/var/www/bootstrap/cache"]

CMD ["composer", "install", "--no-dev", "--optimize-autoloader"]

CMD ["php", "artisan", "key:generate"]

CMD ["php", "artisan", "migrate:fresh"]

CMD ["php", "artisan", "db:seed"]

EXPOSE 9000

CMD ["php-fpm"]
