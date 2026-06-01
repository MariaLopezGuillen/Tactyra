FROM php:8.2-apache

# Instalar extensiones necesarias para Laravel + MySQL
RUN apt-get update && apt-get install -y \
    git curl zip unzip \
    libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install \
        pdo pdo_mysql \
        zip mbstring bcmath \
        gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar el proyecto (subcarpeta tactyra es el root de Laravel)
COPY tactyra/ /var/www/html/

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction \
    --working-dir=/var/www/html

# Permisos para Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Configurar Apache para apuntar al public/ de Laravel
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' \
    /etc/apache2/sites-available/000-default.conf

# Habilitar mod_rewrite para las rutas de Laravel
RUN a2enmod rewrite

# Configurar AllowOverride para .htaccess
RUN echo '<Directory /var/www/html/public>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/sites-available/000-default.conf

# Suprimir el warning de ServerName
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Generar APP_KEY y cachear config al arrancar
COPY tactyra/.env.example /var/www/html/.env

WORKDIR /var/www/html

# Script de arranque: genera key y arranca Apache
RUN echo '#!/bin/bash\n\
php artisan key:generate --force\n\
php artisan config:cache\n\
php artisan route:cache\n\
apache2-foreground' > /usr/local/bin/start.sh \
    && chmod +x /usr/local/bin/start.sh

EXPOSE 80

CMD ["/usr/local/bin/start.sh"]
