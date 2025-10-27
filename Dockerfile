# Use PHP with Apache
FROM php:8.2-apache

# Copy all project files
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Move into public as web root
RUN cp -r public/* /var/www/html/ && rm -rf public

# Optional: install extensions if you use them (like Twig)
RUN docker-php-ext-install pdo pdo_mysql

EXPOSE 80
