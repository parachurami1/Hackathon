#!/bin/bash

# Initialize the SQLite database
sqlite3 /var/www/html/site/database.sqlite < /var/www/html/init.sql

# Set appropriate permissions
chown -R www-data:www-data /var/www/html
chmod -R 755 /var/www/html

# Start Apache
apache2-foreground