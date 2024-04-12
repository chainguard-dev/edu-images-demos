FROM chainguard/go:latest-dev

# VS Code's requirements. posix-libc-utils for getent and ldconfig refreshes ld.so.cache for requirements script
RUN apk update && apk add posix-libc-utils && ldconfig

USER nonroot
# These are used by the go extension for VS Code
RUN    go install -v golang.org/x/tools/gopls@latest \
    && go install -v honnef.co/go/tools/cmd/staticcheck@latest
