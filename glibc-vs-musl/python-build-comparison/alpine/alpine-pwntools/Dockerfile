FROM alpine:latest
RUN apk add --no-cache musl-dev gcc python3 python3-dev libffi-dev libcap-dev make curl git pkgconfig openssl-dev bash alpine-sdk py3-pip 
RUN python -m venv my-venv
RUN my-venv/bin/python -m pip install --upgrade pip


# Install latest cmake
RUN git clone https://github.com/Kitware/CMake.git && cd CMake && ./bootstrap && make && make install
ENV PATH=$PATH:/usr/local/bin

# setup rust
RUN curl --proto '=https' --tlsv1.2 https://sh.rustup.rs -sSf > setup-rust.sh
RUN bash setup-rust.sh -y
ENV PATH=$PATH:/root/.cargo/bin


RUN my-venv/bin/pip3 install cryptography bcrypt capstone zstandard psutil urllib3 sortedcontainers six pynacl pygments plumbum MarkupSafe idna charset-normalizer
RUN my-venv/bin/pip3 install unicorn certifi unix-ar rpyc ropgadget requests python-dateutil pysocks pyserial pyelftools psutil paramiko packaging mako intervaltree colored-traceback

RUN my-venv/bin/pip3 install pwntools