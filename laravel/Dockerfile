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

# Script de inicio: si Artisan no existe, instalamos Laravel en un tmp y luego lo copiamos
CMD bash -c "if [ ! -f artisan ]; then \
        echo 'Instalando Laravel...'; \
        composer create-project --prefer-dist laravel/laravel /tmp/laravel && \
        cp -R -n /tmp/laravel/* . && \
        cp -R -n /tmp/laravel/.[!.]* . || true ; \
    fi && \
    composer install && \
    php artisan serve --host=0.0.0.0 --port=8000"
