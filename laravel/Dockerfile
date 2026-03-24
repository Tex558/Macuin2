FROM php:8.2-cli

# Instalar dependencias del sistema necesarias para Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Exponer el puerto de desarrollo de Laravel
EXPOSE 8000

# Script de inicio: si Artisan no existe, instalamos Laravel; luego servimos la aplicación
CMD bash -c "if [ ! -f artisan ]; then \
        echo 'Instalando Laravel...'; \
        composer create-project --prefer-dist laravel/laravel . ; \
    fi && \
    php artisan serve --host=0.0.0.0 --port=8000"
