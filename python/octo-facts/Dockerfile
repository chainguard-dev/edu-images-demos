FROM cgr.dev/chainguard/python:latest

WORKDIR /app

COPY main.py facts.txt ./

ENTRYPOINT [ "python", "/app/main.py" ]