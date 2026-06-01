FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git curl zip unzip \
    libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install \
        pdo pdo_mysql \
        zip mbstring bcmath \
        gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY tactyra/ /var/www/html/

RUN composer install --no-dev --optimize-autoloader --no-interaction \
    --working-dir=/var/www/html

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' \
    /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

RUN echo '<Directory /var/www/html/public>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/sites-available/000-default.conf

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

COPY tactyra/.env.example /var/www/html/.env

WORKDIR /var/www/html

RUN echo '#!/bin/bash\nphp artisan key:generate --force\nphp artisan config:cache\nphp artisan route:cache\napache2-foreground' > /usr/local/bin/start.sh \
    && chmod +x /usr/local/bin/start.sh

EXPOSE 80

CMD ["/usr/local/bin/start.sh"]