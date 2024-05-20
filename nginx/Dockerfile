FROM cgr.dev/chainguard/nginx:latest

COPY nginx.conf /etc/nginx/nginx.conf

# Copies the html needed
COPY data /usr/share/nginx/html/

CMD ["-p", "8080:8080"]
