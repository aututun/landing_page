FROM php:8.1.10-fpm

# Cài các thư viện hệ thống cần thiết
RUN apt-get update && apt-get install -y --no-install-recommends \
    libzip-dev \
    libxml2-dev \
    libonig-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    unzip \
    curl \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        mbstring \
        zip \
        bcmath \
        xml \
        gd \
        opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Cấu hình PHP
RUN echo "memory_limit=512M" > /usr/local/etc/php/conf.d/99-custom.ini \
    && echo "upload_max_filesize=100M" >> /usr/local/etc/php/conf.d/99-custom.ini \
    && echo "post_max_size=100M" >> /usr/local/etc/php/conf.d/99-custom.ini \
    && echo "max_execution_time=60" >> /usr/local/etc/php/conf.d/99-custom.ini

# Cài Composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# Làm việc trong thư mục dự án
WORKDIR /var/www/html

# Copy mã nguồn và cài dependency
COPY ./ ./
RUN composer install --no-dev --optimize-autoloader

# Quyền cho PHP-FPM
RUN chown -R www-data:www-data /var/www/html

EXPOSE 9000
CMD ["php-fpm"]
