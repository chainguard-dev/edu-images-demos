FROM sconecuratedimages/muslgcc
RUN apk upgrade
RUN apk add  openssh-client llvm clang gdb git curl zsh tmux wget libxml2 autoconf vim libtool automake pkgconfig make binutils gcc dpkg libevent-dev bison flex openssl-dev texinfo gmp-dev mpfr-dev

# RUN wget https://musl.libc.org/releases/musl-1.2.5.tar.gz

# RUN tar -xvf musl-1.2.5.tar.gz

# RUN cd musl-1.2.5 && CC="gcc" ./configure && make && make install


COPY comparison.sh /comparison.sh