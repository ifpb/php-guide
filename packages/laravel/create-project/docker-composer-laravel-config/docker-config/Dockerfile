FROM php:7.3-fpm-alpine

COPY ./src/ /var/www

WORKDIR /var/www

RUN apk update && apk add mysql-client zip libzip-dev

RUN docker-php-ext-install pdo pdo_mysql zip

RUN php -r "copy('https://getcomposer.org/composer.phar', 'composer.phar');" \
  && mv composer.phar /usr/local/bin/composer \
  && chmod +x /usr/local/bin/composer

RUN composer install

RUN php artisan key:generate