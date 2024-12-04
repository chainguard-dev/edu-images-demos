# go-digester

This demo uses the `go-containerregistry` library to print out the digest of the latest build of a Chainguard image, using `go` as default for image to pull the digest from, and with an optional parameter to specify a different image name.

Build the image with:

```shell
docker build . -t digester
```

Then use the following command to run the image.You can replace `mariadb` with any other image name available in the free tier:

```shell
docker run --rm digester mariadb
```
```shell
The latest digest of the mariadb Chainguard Image is sha256:6ba5d792d463b69f93e8d99541384d11b0f9b274e93efdeb91497f8f0aae03d1
```