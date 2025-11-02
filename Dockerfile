# Gunakan image PHP bawaan
FROM php:8.2-apache

# Copy semua file project ke direktori server
COPY . /var/www/html/

# Expose port 80
EXPOSE 80
