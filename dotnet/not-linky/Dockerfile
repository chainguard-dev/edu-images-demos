# Learn about building .NET container images:
# https://github.com/dotnet/dotnet-docker/blob/main/samples/README.md
ARG IMAGE_REGISTRY="mcr.microsoft.com"
FROM --platform=$BUILDPLATFORM ${IMAGE_REGISTRY}/dotnet/sdk:9.0 AS build
ARG TARGETARCH
WORKDIR /source

# Copy project file and restore as distinct layers
COPY --link *.csproj .
RUN dotnet restore -a $TARGETARCH

# Copy source code and publish app
COPY --link . .
RUN dotnet publish -a $TARGETARCH --no-restore -o /app

# Runtime stage
FROM ${IMAGE_REGISTRY}/dotnet/runtime:9.0
WORKDIR /app
COPY --link --from=build /app .
USER $APP_UID
ENTRYPOINT ["./dotnetapp"]
