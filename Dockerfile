FROM php:8.2-apache

# Install MySQL extensions used by the app
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache rewrite support
RUN a2enmod rewrite

# Copy application source
COPY . /var/www/html/
