# Dotnet Migration Example

## Overview
This directory contains an example of migrating a dotnet application from upstream Microsoft dotnet image to the Chainguard dotnet image.

The example is a simple application that takes an example from the microsoft dotnet examples github repo and migrates it to using Chainguard dotnet images.

The dotnet upstream example comes directly from MSFT's github [repo](https://github.com/dotnet/dotnet-docker/blob/main/samples/README.md). The examples in this directory were originally hosted in Chainguard's [`cs-workshop` directory](https://github.com/chainguard-demo/cs-workshop). 

## Steps
### Using upstream image:
1. cd the not-linky directory
```
cd not-linky
```
2. Build the application

```
docker build -t dotnet-notlinky .
```
3. Run the image:

```
docker run --rm dotnet-notlinky
```
4. Scan the image:
```
grype dotnet-notlinky
```

### Takeaways:
1. Note that the upstream image runs by root as default, so in the dockerfile they set a non-root user.
2. Vulnerabilities from the grype scan
3. Number of packages, files, etc.

### Using Chainguard images:
1. cd the linky directory
```
cd linky
```
2. Build the application

```
docker build -t dotnet-linky .
```
3. Run the image:

```
docker run --rm dotnet-linky
```
4. Scan the image:
```
grype dotnet-linky
```

### Compare Image Sizes:
```
docker image list | grep dotnet-
```

### Takeaways:
1. Note that Chainguard image does not run as a root user (by default)
2. 0 Vulnerabilities from the grype scan
3. Number of packages, files, etc.

## Compare Dockerfiles
1. Note that container registries are different.
2. Both dockerfiles use multistage builds.
3. MSFT upstream image runs as root by default, the Chainguard image does not, so we need to switch to the root user in the Chainguard dockerfile to run a privledged command like dotnet restore (which installs dependencies for the app)
4. In the runtime stage the MSFT example switches to a non-root user, this is not needed in the Chainguard dockerfile because by default Chainguard images do not run as root 
