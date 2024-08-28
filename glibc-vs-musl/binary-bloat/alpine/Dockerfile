FROM alpine:latest
RUN apk add --no-cache musl-dev gcc python3 python3-dev libffi-dev libcap-dev make curl git pkgconfig openssl-dev bash alpine-sdk py3-pip

COPY hello-world.c /hello-world.c

RUN gcc  /hello-world.c -O3 -static -o /hello-world-static
RUN du -sh /hello-world-static

RUN gcc -o /hello-world /hello-world.c -O3
RUN du -sh /hello-world