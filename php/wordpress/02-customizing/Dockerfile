FROM cgr.dev/chainguard/wordpress:latest-dev
ARG UID=1000

USER root
RUN apk add shadow
RUN useradd -u "$UID" -s /bin/bash wordpress
RUN chown -R wordpress:wordpress /var/www/html

USER wordpress
