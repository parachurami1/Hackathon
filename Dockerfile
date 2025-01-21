# Use the official PHP image with Apache
FROM php:8.2-apache

# Update package repository and install dependencies
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    sqlite3 \
    && docker-php-ext-install pdo pdo_sqlite

# Configure Apache to use the correct document root and set the ServerName
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf \
    && echo "<VirtualHost *:80>\n\
        DocumentRoot /var/www/html/site\n\
        <Directory /var/www/html/site>\n\
            Options Indexes FollowSymLinks\n\
            AllowOverride All\n\
            Require all granted\n\
        </Directory>\n\
    </VirtualHost>" > /etc/apache2/sites-available/000-default.conf \
    && a2enmod rewrite

# Set environment variable for SQLite database file
ENV SQLITE_DB /var/www/html/site/database.sqlite

# Copy application files to the container
COPY . /var/www/html/

# Set working directory to the site folder
WORKDIR /var/www/html/site/

# Ensure SQLite database file exists and is writable
RUN touch /var/www/html/site/database.sqlite \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod 777 /var/www/html/site/database.sqlite \
    && chmod 777 /var/www/html/site/uploads

# Copy the SQL initialization script to the appropriate directory
COPY init.sql /docker-entrypoint-initdb.d/init.sql

# Initialize SQLite database with SQL script
RUN sqlite3 /var/www/html/site/database.sqlite < /docker-entrypoint-initdb.d/init.sql

# Expose port 80
EXPOSE 80
