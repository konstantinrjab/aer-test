FROM php:7.1-fpm

RUN apt-get update && apt-get install -y wget git unzip \
    && pecl install xdebug-2.6.1 \
    && docker-php-ext-enable xdebug

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ADD ./docker/php-fpm/php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www/code
