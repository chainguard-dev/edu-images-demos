# greet-server

The following build demonstrates an application that's accessible by HTTP server. The application renders a simple message that changes based on the URI.

Build the image, tagging it `greet-server`:

```shell
docker build . -t greet-server
```

Run the image:

```shell
docker run -p 8080:8080 greet-server
```

Visit `http://0.0.0.0:8080/` using a web browser on your host machine. You should see the following:

```shell
Hello, Linky 🐙!
```

Changes to the URI will be routed to the application. Try visiting http://0.0.0.0:8080/Chainguard%20Customer. You should see the following output:

```shell
Hello, Chainguard Customer!
```

The application will also share version information at http://0.0.0.0:8080/version.