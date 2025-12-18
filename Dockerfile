FROM php:8.2-apache

# Disable MPM lain
RUN a2dismod mpm_event mpm_worker \
 && a2enmod mpm_prefork rewrite

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Set document root ke /public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf

# Copy app
COPY . /var/www/html
WORKDIR /var/www/html

# Permission Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80
