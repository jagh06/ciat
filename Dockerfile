FROM php:8.2-apache

# Instala las extensiones de PHP necesarias, incluyendo mysqli
RUN docker-php-ext-install mysqli && \
    docker-php-ext-enable mysqli
