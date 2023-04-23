# Imagen base de PHP
FROM php:8.0.2-fpm

# Actualizar lista de paquetes e instalar extensiones de PHP necesarias
RUN apt-get update && apt-get install -y \
    git \
    zip \
    curl \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instalar Node.js y npm
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs

# Copiar los archivos del proyecto a la imagen de Docker
COPY . /var/www/html

# Cambiar los permisos de los archivos del proyecto
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Instalar las dependencias de Composer y Node.js
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN npm install --global npm
RUN cd /var/www/html && composer install && npm install && npm run dev

# Exponer el puerto 9000 de PHP-FPM
EXPOSE 9000

# Ejecutar el servidor PHP-FPM
CMD ["php-fpm"]
