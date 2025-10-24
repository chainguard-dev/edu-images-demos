# Multi-stage build using Chainguard images
# Stage 1: Build stage with Python dev image to install dependencies
FROM cgr.dev/chainguard/python:latest-dev as builder

WORKDIR /app

# Copy requirements and install dependencies
COPY requirements.txt .
RUN pip install --user --no-cache-dir -r requirements.txt

# Stage 2: Runtime stage with minimal Python image
FROM cgr.dev/chainguard/python:latest

WORKDIR /app

# Copy installed packages from builder
COPY --from=builder /home/nonroot/.local/lib/python3.*/site-packages /home/nonroot/.local/lib/python3.13/site-packages

# Copy application code
COPY main.py .

# Run as non-root user (already set in base image)
USER nonroot

# Set Python path to include user-installed packages
ENV PYTHONPATH=/home/nonroot/.local/lib/python3.13/site-packages

CMD ["main.py"]
