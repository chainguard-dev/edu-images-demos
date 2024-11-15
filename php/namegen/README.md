# namegen

This is a simple PHP CLI app that generates random names. It is used as a demo for building a distroless PHP image with a custom PHP CLI app as entry point, using `latest` and `latest-dev` variants.

## Usage
### Build the image
```shell
docker build -t chainguard/namegen:latest .
```

### Run the image

```shell
docker run --rm php-namegen get
```