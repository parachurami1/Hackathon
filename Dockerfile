# Use the official PHP image with Apache
FROM php:8.2-apache

# Update package repository and install dependencies
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    sqlite3 \
    && docker-php-ext-install pdo pdo_sqlite

# Configure Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf \
    DocumentRoot /var/www/html/site\n\
    && echo "<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>" > /etc/apache2/conf-available/app.conf \
    && a2enconf app \
    && a2enmod rewrite

# Set environment variable for SQLite database file
ENV SQLITE_DB /var/www/html/site/database.sqlite

# Copy application files to the container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Copy the SQL initialization script
COPY init.sql /docker-entrypoint-initdb.d/init.sql

# Ensure SQLite database file exists and is writable
RUN touch /var/www/html/site/database.sqlite \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod 777 /var/www/html/site/database.sqlite

# Initialize SQLite database with SQL script
RUN sqlite3 /var/www/html/site/database.sqlite < /docker-entrypoint-initdb.d/init.sql

WORKDIR /var/www/html/site

# Expose port 80
EXPOSE 80
