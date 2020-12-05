FROM php:8.0-fpm-alpine

RUN apk update

# Install phpize
RUN apk add --no-cache --virtual .build-deps \
  file \
  re2c \
  autoconf \
  make \
  zlib \
  zlib-dev \
  libpng \
  libpng-dev \
  libzip \
  libzip-dev \
  g++ \
  gcc \
  imagemagick-dev \
  libtool

# Install PHP dependencies
RUN docker-php-ext-install \
    zip \
    pdo_mysql

COPY ./docker/resources/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN pecl install xdebug-3.0.0

#RUN docker-php-ext-enable xdebug

# Copy over the init script
COPY ./docker/resources/init.sh /usr/local/bin
RUN chmod +x /usr/local/bin/init.sh

# Composer
RUN apk add \
  git \
  unzip

COPY ./docker/resources/install-composer.sh /usr/local/bin/install-composer

RUN chmod +x /usr/local/bin/install-composer
RUN install-composer

# Install general utilities
RUN apk add \
  vim \
  less

COPY ./docker/resources/dockerize /usr/local/bin/dockerize

WORKDIR /var/www

# Cleanup
RUN rm -rf /usr/local/bin/install-composer

CMD init.sh
