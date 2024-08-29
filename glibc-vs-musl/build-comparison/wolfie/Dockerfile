FROM cgr.dev/chainguard/wolfi-base
ARG DEBIAN_FRONTEND=noninteractive
ARG READ_TOKEN
ENV LANG C.UTF-8
ENV LC_ALL C.UTF-8

RUN apk upgrade
RUN apk add  openssh-client clang gdb git curl zsh tmux wget libxml2 autoconf vim libtool automake make binutils gcc dpkg libevent-dev bison flex openssl-dev texinfo gmp-dev mpfr-dev glibc-dev



COPY comparison.sh /comparison.sh