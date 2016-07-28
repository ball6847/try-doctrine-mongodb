FROM yavin/alpine-php-fpm:7.0
MAINTAINER Porawit Poboonma <ball6847@gmail.com>

RUN php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/local/bin --filename=composer && \
    apk --update --no-cache add php7-mongodb && \
    rm -rf /var/cache/apk/*
