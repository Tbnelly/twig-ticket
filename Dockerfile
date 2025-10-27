# Use PHP with Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Copy all project files
COPY . /var/www/html

# Move contents of /public to Apache root
RUN cp -r public/* /var/www/html/ && rm -rf public

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Expose port 80 (Apache default)
EXPOSE 80

# Start Apache in foreground
CMD ["apache2-foreground"]
