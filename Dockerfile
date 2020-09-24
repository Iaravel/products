FROM php:7.4-cli-alpine as php-base

# Install composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /var/www/.composer
ENV LIBRDKAFKA_VERSION v1.1.0

COPY --from=composer:1.10.13 /usr/bin/composer /usr/bin/composer

RUN apk add git && \
    apk add --no-cache --virtual .build-deps $PHPIZE_DEPS && \
    pecl install ds && \
    docker-php-ext-enable ds && \
    composer global require "hirak/prestissimo:^0.3" --prefer-dist --no-progress \
    --no-suggest --optimize-autoloader --classmap-authoritative  --no-interaction -q && \
    apk del .build-deps && \
    rm -Rf /tmp/*

EXPOSE 80

WORKDIR /var/www/html

#COPY composer.json ./

#RUN composer install --no-dev --no-progress --no-suggest -anq --no-scripts

FROM php-base AS php-prod

#RUN composer install --no-dev --no-progress --no-suggest -anq && \
#    composer dump-env prod

FROM php-base AS php-dev-base

RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS && \
    pecl install pcov xdebug && \
    docker-php-ext-enable pcov xdebug && \
    apk del .build-deps && \
    rm -rf /tmp/*
