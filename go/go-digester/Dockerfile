FROM cgr.dev/chainguard/go AS builder
COPY . /app
RUN cd /app && go build -o go-digester .

FROM cgr.dev/chainguard/glibc-dynamic
COPY --from=builder /app/go-digester /usr/bin/
CMD ["/usr/bin/go-digester"]
