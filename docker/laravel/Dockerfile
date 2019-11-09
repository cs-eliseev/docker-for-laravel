# Init env
ARG PHP_VERSION
ARG USER_ID
ARG GROUP_ID
ARG TZ
ARG XDEBUG_PORT

FROM php:${PHP_VERSION}-fpm

# timezone
RUN ln -fs /usr/share/zoneinfo/${TZ} /etc/localtime \
    && echo ${TZ} > /etc/timezone

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    curl \
    vim \
    openssl \
    wget \
    gnupg \
    libzip-dev \
    libmcrypt-dev \
    libpng-dev \
    libxml2-dev \
    && docker-php-ext-configure zip --with-libzip \
    && pecl install mcrypt \
    && docker-php-ext-enable mcrypt \
    && docker-php-ext-install mbstring bcmath zip xml gd \
    && docker-php-ext-install mysqli pdo pdo_mysql

# Imagick
RUN apt-get install -y libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick

# XDebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Redis
RUN git clone https://github.com/phpredis/phpredis.git /usr/src/php/ext/redis \
    && docker-php-ext-install redis

RUN curl -sL https://deb.nodesource.com/setup_8.x | bash

#RUN usermod -u ${USER_ID} www-data \
#    && groupmod -g ${GROUP_ID} www-data \
#    && chmod 775 -R storage bootstrap/cache