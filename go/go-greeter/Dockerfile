FROM cgr.dev/chainguard/go AS builder
COPY . /app
RUN cd /app && go build -o go-greeter .

FROM cgr.dev/chainguard/static
COPY --from=builder /app/go-greeter /usr/bin/
ENTRYPOINT ["/usr/bin/go-greeter"]
