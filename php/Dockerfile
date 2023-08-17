FROM php:8.1-fpm

WORKDIR /var/www/html/
COPY ./php/src/ ./
COPY ./php/src/composer.json ./

RUN apt-get update
RUN apt-get install -y openssl zip unzip git curl
RUN apt-get install -y libzip-dev libonig-dev libicu-dev
RUN apt-get install -y autoconf pkg-config libssl-dev

RUN docker-php-ext-install bcmath mbstring intl mysqli pdo pdo_mysql opcache

RUN chmod +x /var/www/html/artisan
RUN cp /var/www/html/.env.example /var/www/html/.env

WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


EXPOSE 9000

CMD composer install && php artisan migrate:refresh --seed && php artisan key:generate && php-fpm 