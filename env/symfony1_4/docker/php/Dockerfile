FROM php:5.6.40-apache
# php.ini 000-default.conf をコピー
COPY ./php.ini /usr/local/etc/php/
COPY ./apache/*.conf /etc/apache2/sites-available/
# apt(Advanced Package Tool) パッケージインストール
# PDO driver インストール(mysql)
# mod_rewrite 有効化
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    vim \
    zip \
    && docker-php-ext-install pdo_mysql \
    && a2enmod rewrite
