FROM php:8.0-apache
RUN apt-get update && apt-get upgrade -y &&\
    docker-php-ext-install mysqli && docker-php-ext-enable mysqli &&\
    docker-php-ext-install pdo pdo_mysql &&\
    apt-get update && apt-get upgrade -y &&\
    a2enmod rewrite