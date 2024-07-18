FROM cgr.dev/chainguard/wordpress:latest-dev AS builder
#trigger wp-config.php creation
ENV WORDPRESS_DB_HOST=foo

#copy wp-content folder
COPY ./wp-content /usr/src/wordpress/wp-content

#run entrypoint script
RUN /usr/local/bin/docker-entrypoint.sh php-fpm --version

FROM cgr.dev/chainguard/wordpress:latest

COPY --from=builder --chown=php:php /var/www/html /var/www/html
