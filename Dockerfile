FROM php:8.2-fpm

WORKDIR /var/www


RUN apt-get update && apt-get install -y \
      apt-utils \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      zip unzip \
      git && \
      docker-php-ext-install bcmath && \
      docker-php-ext-install gd && \
      docker-php-ext-install zip && \
      docker-php-ext-install pdo pdo_pgsql pgsql && \
      apt-get install curl && \
      curl -fsSL https://deb.nodesource.com/setup_16.x | bash && \
      apt-get install nodejs



COPY ./php/php.ini /usr/local/etc/php/conf.d/php.ini


ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin


# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Change current user to www
USER www

EXPOSE 9000