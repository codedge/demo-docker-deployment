FROM serversideup/php:8.4-fpm-nginx

COPY composer.* symfony.lock ./
COPY .env ./
COPY bin bin/
COPY config config/
COPY migrations migrations/
COPY public public/
COPY src src/

RUN set -eux; \
    composer install --prefer-dist --no-autoloader --no-interaction --no-scripts --no-progress; \
    composer clear-cache

RUN set -eux; \
    mkdir -p var/cache var/log; \
    composer dump-autoload --optimize --classmap-authoritative;

# Otherwise the web server cannot write the cache directory
RUN chown -R www-data:www-data var

COPY --chmod=755 ./entrypoint.d/ /etc/entrypoint.d/

# Switch back to the unprivileged www-data user
USER www-data
