FROM wordpress

RUN apt-get update --yes
RUN apt-get install curl --yes
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug