FROM php:8.1-apache

# Install ekstensi mysqli
RUN docker-php-ext-install mysqli

# Copy file web dari folder lokal (misal: app) ke dalam container
COPY . /var/www/html/