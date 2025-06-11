FROM php:8.3.1-fpm

RUN apt-get update -y \
    && apt-get install -y \
    nginx \
    apt-utils \
    zlib1g-dev \
    libc-client-dev \
    libkrb5-dev \
    libfreetype6-dev \
    libjpeg-dev \
    libpng-dev \
    libxml2-dev \
    libzip-dev \
    cron \
    rsyslog \
    iputils-ping \
    curl \
    traceroute \
    zip \
    unzip \
    socat \
    nano \
    net-tools \
    libldap2-dev \
    openssl 

# PHP_CPPFLAGS are used by the docker-php-ext-* scripts
ENV PHP_CPPFLAGS="$PHP_CPPFLAGS -std=c++11"

RUN docker-php-ext-install pdo_mysql \
    && docker-php-ext-install opcache \
    && docker-php-ext-install sockets \
    && apt-get install libicu-dev -y \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && apt-get remove libicu-dev icu-devtools -y
RUN { \
        echo 'opcache.memory_consumption=128'; \
        echo 'opcache.interned_strings_buffer=8'; \
        echo 'opcache.max_accelerated_files=4000'; \
        echo 'opcache.revalidate_freq=2'; \
        echo 'opcache.fast_shutdown=1'; \
        echo 'opcache.enable_cli=1'; \
        echo 'max_execution_time=3000'; \
        echo 'max_input_time=3000'; \
        echo 'default_socket_timeout=3000'; \
        echo 'post_max_size=2048M'; \
        echo 'memory_limit=2048M'; \
        echo 'max_input_vars=5000'; \
    } > /usr/local/etc/php/conf.d/php-opocache-cfg.ini
RUN apt-get install --no-install-recommends -y apt-utils zlib1g-dev libc-client-dev libkrb5-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev libxml2-dev libzip-dev cron rsyslog zip unzip socat nano net-tools libldap2-dev libldb-dev openssl
RUN docker-php-ext-configure gd --with-jpeg --with-freetype --with-webp --with-xpm \
    && docker-php-ext-install gd \
    && docker-php-ext-install exif \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install pdo \
    && docker-php-ext-install zip \
    && docker-php-ext-install xml \
    && PHP_OPENSSL=yes docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-install imap \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install iconv \
    && docker-php-ext-install soap

# Cài đặt Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Cài đặt các phụ thuộc PHP qua Composer
COPY ./composer.json ./

COPY --chown=www-data:www-data ./ /var/www/html

WORKDIR /var/www/html

RUN composer install --no-dev --optimize-autoloader

EXPOSE 80