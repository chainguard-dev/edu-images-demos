FROM cgr.dev/chainguard/wolfi-base
ARG DEBIAN_FRONTEND=noninteractive
ARG READ_TOKEN
ENV LANG C.UTF-8
ENV LC_ALL C.UTF-8

RUN apk upgrade
RUN apk add python3 python3-dev py3-pip
RUN pip3 install pwntools