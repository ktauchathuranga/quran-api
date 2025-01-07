# Dockerfile
FROM php:8.1-apache

# Set working directory
WORKDIR /var/www/html

# Install required PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache Rewrite module
RUN a2enmod rewrite

# Copy project files to container
COPY . /var/www/html/

# Expose port 80
EXPOSE 80
