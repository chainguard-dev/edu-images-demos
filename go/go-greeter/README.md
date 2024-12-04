#  go-greeter

The following build demonstrates a command line application with support for flags and positional arguments. The application prints a modifiable greeting message and provides usage information if the wrong number of arguments are passed by a user or the user passes an unrecognized flag.

```shell
docker build . -t go-greeter
```
Build the image, tagging it `go-greeter`:

```shell
docker build . -t go-greeter
```

Run the image:

```shell
docker run go-greeter
```
You should see output similar to the following:

```shell
Hello, Linky 🐙!
```

You can also pass in arguments that will be parsed by the Go CLI application:

```shell
docker run go-greeter -g Greetings "Chainguard user"
```
This will produce the following output:

```shell   
Greetings, Chainguard user!
```

The application will also share usage instructions when prompted with the `--help` flag or when invalid flags are passed.