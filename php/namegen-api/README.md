# namegen-api

This demo uses the `latest-fpm` image variant to serve a web PHP app / API in a Docker Compose setup using our Nginx image as web server.

## Usage
### Bring the Environment Up
```shell
docker compose up
```
This will run a server on `http://localhost:8000`.

### Make Requests

```shell
curl 0.0.0.0:8000
```
```shell
{"animal":"octopus","adjective":"graceful"}
```

```shell
curl '0.0.0.0:8000?animal=dog'
```
```shell
{"animal":"dog","adjective":"ravishing"}
```