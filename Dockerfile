FROM php:8.3-fpm

# Gerekli paketleri kur
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev

# PHP extension'larını kur
RUN docker-php-ext-install pdo pdo_pgsql pgsql mbstring exif pcntl bcmath gd

# Composer'ı kur
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Çalışma dizinini oluştur
WORKDIR /var/www/html

# Dosya izinlerini ayarla
RUN chown -R www-data:www-data /var/www/html
