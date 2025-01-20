# Use an official PHP image with Apache
FROM php:8.2-apache

# Install required extensions for PHP and MySQL
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && chmod -R 755 /var/www/html \
    && chown -R www-data:www-data /var/www/html \
    &&echo "ServerName localhost" >> /etc/apache2/apache2.conf



# Enable Apache rewrite module
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Copy the website files into the container
COPY ./site /var/www/html/

# Set appropriate permissions
RUN chmod -R 755 /var/www/html && chown -R www-data:www-data /var/www/html

# Expose port 80 for the Apache server
EXPOSE 80
