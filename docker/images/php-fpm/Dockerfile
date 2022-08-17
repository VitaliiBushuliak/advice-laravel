FROM php:8.1-fpm

RUN apt-get update && apt-get upgrade -y

RUN apt-get install -y \
    git \
    zip \
    unzip

RUN docker-php-ext-install mysqli \
    pdo \
    pdo_mysql

RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

RUN apt-get autoremove -y \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN chown -R www-data:www-data /var/www

WORKDIR /var/www/html
