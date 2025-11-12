# build the image
docker build -t dotnetapp-linky .

# run the image
docker run --rm dotnetapp-linky

# scan the image
grype dotnetapp-linky

# compare image size
docker image ls | grep dotnetapp