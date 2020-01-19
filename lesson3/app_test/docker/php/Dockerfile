FROM php:7.2.13-fpm-alpine3.8
 
RUN addgroup -g 1000 -S borgir
RUN adduser -u 1000 -S -G borgir borgir
 
COPY www.conf /usr/local/etc/php-fpm.d/www.conf
RUN rm /usr/local/etc/php-fpm.d/zz-docker.conf
 
USER borgir
 
CMD ["php-fpm", "--nodaemonize"]