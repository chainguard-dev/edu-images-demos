FROM cgr.dev/chainguard/php:latest-dev AS builder
USER root
COPY . /app
RUN chown -R php /app
USER php
RUN cd /app && \
    composer install --no-progress --no-dev --prefer-dist

FROM cgr.dev/chainguard/php:latest
COPY --from=builder /app /app

ENTRYPOINT [ "php", "/app/namegen" ]

