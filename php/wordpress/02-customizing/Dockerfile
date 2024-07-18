FROM cgr.dev/chainguard/wordpress:latest-dev
ARG UID=1000

USER root
RUN addgroup wordpress && adduser -SD -u "$UID" -s /bin/bash wordpress wordpress
RUN chown -R wordpress:wordpress /var/www/html

USER wordpress
