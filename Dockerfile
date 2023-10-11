ARG PHP_VERSION
FROM php:${PHP_VERSION}

ARG APP_DIR=/var/www

### apt-utils é um extensão de recursos do gerenciador de pacotes APT
RUN apt-get update -y && apt-get install -y --no-install-recommends \
    apt-utils

# dependências recomendadas de desenvolvido para ambiente linux
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip \
    libpng-dev \
    libpq-dev \
    libxml2-dev

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
    && pecl install mcrypt-1.0.6 \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable mcrypt  pdo_mysql pdo mysqli \
    && docker-php-ext-configure gd --with-freetype --with-jpeg\
    && docker-php-ext-install -j$(nproc) gd

# RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

COPY ./php.ini /etc/php8/php-fpm.d/www.conf

WORKDIR $APP_DIR
RUN cd $APP_DIR
RUN chown www-data:www-data $APP_DIR

COPY --chown=www-data:www-data ./ .

# RUN apt-get install nginx -y
# RUN rm -rf /etc/nginx/sites-enabled/* && rm -rf /etc/nginx/sites-available/*
# COPY ./sites.conf /etc/nginx/sites-enabled/default.conf
# COPY ./error.html /var/www/html/error.html

RUN apt-get clean && rm -rf /var/lib/apt/lists/*
# CMD [ "php", "./your-script.php" ]