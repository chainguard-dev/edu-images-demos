FROM cgr.dev/chainguard/python:latest-dev as builder

WORKDIR /inky

COPY requirements.txt .

RUN pip install -r requirements.txt --user

FROM cgr.dev/chainguard/python:latest

WORKDIR /inky

# Make sure you update Python version in path
COPY --from=builder /home/nonroot/.local/lib/python3.11/site-packages /home/nonroot/.local/lib/python3.11/site-packages

COPY inky.py inky.png .

ENTRYPOINT [ "python", "/inky/inky.py" ]