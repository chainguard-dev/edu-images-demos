FROM ubuntu:24.04
ARG DEBIAN_FRONTEND=noninteractive
ARG READ_TOKEN
ENV LANG C.UTF-8
ENV LC_ALL C.UTF-8

RUN apt-get install --reinstall ca-certificates
RUN apt-get update --fix-missing
RUN apt-get install -y --no-install-recommends  openssh-client llvm clang gdb git curl zsh tmux wget libxml2 autoconf vim libtool automake make binutils gcc dpkg libevent-dev bison flex texinfo

# RUN wget https://musl.libc.org/releases/musl-1.2.5.tar.gz

# RUN tar -xvf musl-1.2.5.tar.gz

# RUN cd musl-1.2.5 && CC="gcc" ./configure && make && make install


COPY comparison.sh /comparison.sh