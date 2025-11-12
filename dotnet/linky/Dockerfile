# Learn about building .NET container images:
# https://github.com/dotnet/dotnet-docker/blob/main/samples/README.md
ARG IMAGE_REGISTRY="cgr.dev/chainguard"
FROM --platform=$BUILDPLATFORM ${IMAGE_REGISTRY}/dotnet-sdk:latest-dev AS build
ARG TARGETARCH
WORKDIR /source

# Copy project file and restore as distinct layers
COPY --link *.csproj .
# switch to root user in order to do restore
USER 0
RUN dotnet restore -a $TARGETARCH

# Copy source code and publish app
COPY --link . .
RUN dotnet publish -a $TARGETARCH --no-restore -o /app

# Runtime stage
FROM ${IMAGE_REGISTRY}/aspnet-runtime:latest
WORKDIR /app
COPY --link --from=build /app .
ENTRYPOINT ["./dotnetapp"]
