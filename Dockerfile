FROM php:7.2-apache
COPY web/ /var/www/html/
RUN apt-get update && apt-get install -y libpq-dev
RUN docker-php-ext-install pgsql
RUN docker-php-ext-install pdo pdo_pgsql
