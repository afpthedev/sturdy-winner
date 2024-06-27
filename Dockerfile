# Dockerfile

# PHP ve Composer'ı içeren bir temel imaj kullanın
FROM php:7.4-fpm

# Çalışma dizinini ayarla
WORKDIR /var/www/html

# Sistem bağımlılıklarını yükle
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# PHP bağımlılıklarını yükle
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Composer'ı yükle
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Çalışma dizinine uygulama dosyalarını kopyala
COPY . .

# Bağımlılıkları yükle
RUN composer install

# Laravel uygulaması için gerekli dosya izinlerini ayarla
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Container başladığında PHP-FPM'yi çalıştır
CMD ["php-fpm"]

# Uygulamanın 9000 portunda çalışacağını belirt
EXPOSE 9000
