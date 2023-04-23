# Imagen base con PHP 8.0 y Apache
FROM php:8.0-apache

# Instalar dependencias de Laravel
RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        zip \
        unzip \
        libpng-dev \
        libonig-dev \
        libxml2-dev && \
    docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip && \
    pecl install redis && \
    docker-php-ext-enable redis

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# Copiar archivos del proyecto al contenedor
COPY . /var/www/html

# Configuración de Apache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache && \
    cp /var/www/html/.env.example /var/www/html/.env && \
    php /var/www/html/artisan key:generate && \
    php /var/www/html/artisan config:cache && \
    php /var/www/html/artisan route:cache

# Puerto expuesto por el contenedor
EXPOSE 80

# Comando para iniciar Apache
CMD ["apache2-foreground"]
