FROM php:5.6.40-apache
# composer php.iniをコピー
COPY ./php.ini /usr/local/etc/php/
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
