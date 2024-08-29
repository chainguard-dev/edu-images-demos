FROM cgr.dev/chainguard/wolfi-base
RUN apk add --no-cache gcc python3 python3-dev bash py3-pip glibc glibc-dev

COPY hello-world.c /hello-world.c

RUN gcc  /hello-world.c -O3 -static -o /hello-world-static
RUN du -sh /hello-world-static

RUN gcc -o /hello-world /hello-world.c -O3
RUN du -sh /hello-world