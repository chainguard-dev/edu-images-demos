FROM cgr.dev/chainguard/laravel:latest-dev AS builder
USER root
RUN apk update && apk add nodejs npm
COPY . /app
RUN cd /app && chown -R php.php /app
USER php
RUN composer install --no-progress --no-dev --prefer-dist
RUN npm install && npm run build

FROM cgr.dev/chainguard/laravel:latest
COPY --from=builder /app /app
