FROM php:8.1.27-apache

COPY ./php.ini /usr/local/etc/php/

COPY --from=composer:2.7.1 /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    vim \
    zip \
    && docker-php-ext-install pdo_mysql \
    && a2enmod rewrite

COPY . /var/www/html