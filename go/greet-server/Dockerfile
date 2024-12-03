FROM cgr.dev/chainguard/go AS builder
COPY . /app
RUN cd /app && go build

FROM cgr.dev/chainguard/glibc-dynamic
COPY --from=builder /app/greet-server /usr/bin/

EXPOSE 8080

ENTRYPOINT ["/usr/bin/greet-server"]
