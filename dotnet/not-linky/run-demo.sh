# build the image
docker build -t dotnetapp-not-linky .

# run the image
docker run --rm dotnetapp-not-linky

# scan the image
grype dotnetapp-not-linky

# compare image size
docker image ls | grep dotnetapp