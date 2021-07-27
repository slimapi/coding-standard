FROM slimapi/nginx-php:7.4.20

ADD composer.json ${PROJECT_ROOT}
RUN composer install --prefer-dist --no-interaction && \
    composer dump-autoload --optimize && \
    composer clear-cache --quiet

ADD .docker /
ADD . ${PROJECT_ROOT}
