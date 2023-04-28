FROM php:8.1-fpm-alpine
WORKDIR /ImageIntervationProject

RUN docker-php-ext-install pdo pdo_mysql gd
RUN curl -sS https://getcomposer.org/installer | php -- \
        --install-dir=/usr/local/bin --filename=composer

RUN apk --no-cache add pcre-dev ${PHPIZE_DEPS} \
  && pecl install xdebug \
  && docker-php-ext-enable xdebug \
  && apk del pcre-dev ${PHPIZE_DEPS}
COPY . .
RUN composer install

CMD php artisan serve --host=0.0.0.0
