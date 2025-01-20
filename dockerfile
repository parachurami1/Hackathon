# Use the official PHP image with Apache
FROM php:8.1-apache

# Install necessary PHP extensions
RUN docker-php-ext-install mysqli

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy application files to the container
COPY . /var/www/html

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Configure Apache to allow access to the app
RUN echo "<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>" > /etc/apache2/conf-available/app.conf \
    && a2enconf app \
    && a2enmod rewrite

# Expose port 80 for the container
EXPOSE 80

# Start the Apache server
CMD ["apache2-foreground"]
