#!/bin/bash

# Variables
MUSL_GCC="x86_64-alpine-linux-musl-gcc"
GCC="gcc"
LOG_DIR="/build_logs"
PROJ=""

rm -rf $LOG_DIR
mkdir $LOG_DIR


reset_vars() {
    MUSL_LOG="${LOG_DIR}/${PROJ}_musl_gcc_build.log"
    GCC_LOG="${LOG_DIR}/${PROJ}_gcc_build.log"
    touch $MUSL_LOG
    touch $GCC_LOG
}

# Function to time the build process
time_build() {
    local compiler=$1
    local log_file=$2
    local configure_opt=$3

    # Clean previous build artifacts
    make clean > /dev/null 2>&1

    # Configure with the specified compiler
    CC=$compiler ./configure $configure_opt > /dev/null 2>&1

    # Measure and log the build time
    /usr/bin/time -v make -j$(nproc) > $log_file 2>&1
}

run_test(){
    local configure_opt=$1
    reset_vars
    echo "Starting build with musl-gcc..."
    time_build $MUSL_GCC $MUSL_LOG $configure_opt
    echo "Starting build with gcc..."
    time_build $GCC $GCC_LOG $configure_opt

    # Extract and display the build times
    echo "Build times:"
    echo "musl-gcc: $(grep 'Elapsed (wall clock) time' $MUSL_LOG)"
    echo "gcc: $(grep 'Elapsed (wall clock) time' $GCC_LOG)"
}

# Ensure the log directory exists
cd /
git clone https://github.com/mm2/Little-CMS.git
# Navigate to the source directory
PROJ="Little-CMS"
cd $PROJ || { echo "Source directory not found!"; exit 1; }
run_test


# Ensure the log directory exists
cd /
git clone https://github.com/openssl/openssl.git
PROJ="openssl"
# Navigate to the source directory
cd $PROJ || { echo "Source directory not found!"; exit 1; }
cp Configure configure
run_test


# Ensure the log directory exists
cd /
git clone https://github.com/madler/zlib.git
PROJ="zlib"
# Navigate to the source directory
cd $PROJ || { echo "Source directory not found!"; exit 1; }
run_test
make install


# Ensure the log directory exists
cd /
git clone https://github.com/the-tcpdump-group/libpcap.git
PROJ="libpcap"
# Navigate to the source directory
cd $PROJ || { echo "Source directory not found!"; exit 1; }
sh autogen.sh
run_test

# Ensure the log directory exists
cd /
git clone https://github.com/gmp-mirror/gmp.git
PROJ="gmp"
# Navigate to the source directory
cd $PROJ || { echo "Source directory not found!"; exit 1; }
libtoolize --force
aclocal
autoheader
automake --force-missing --add-missing
autoconf
run_test

# Ensure the log directory exists
cd /
git clone https://github.com/curl/curl.git
PROJ="curl"
# Navigate to the source directory
cd $PROJ || { echo "Source directory not found!"; exit 1; }
libtoolize --force
aclocal
autoheader
automake --force-missing --add-missing
autoconf
run_test "--without-ssl"

# Ensure the log directory exists
cd /
git clone https://github.com/sctplab/usrsctp.git
PROJ="usrsctp"
# Navigate to the source directory
cd $PROJ || { echo "Source directory not found!"; exit 1; }
libtoolize --force
aclocal
autoheader
automake --force-missing --add-missing
autoconf
run_test

# Ensure the log directory exists
# cd /
# git clone https://github.com/bminor/binutils-gdb.git
# PROJ="binutils-gdb"
# # Navigate to the source directory
# cd $PROJ || { echo "Source directory not found!"; exit 1; }
# libtoolize --force
# aclocal
# autoheader
# automake --force-missing --add-missing
# autoconf
# run_test "--enable-gprofng=no"