#! env bash
. ../base.sh

for i in $(docker images -q dotnet-example); do
  docker rmi $i
done

clear
banner "Here's an existing Dockerfile for a dotnet application."
pe "$BATCAT ./not-linky/Dockerfile"
pe "docker build -t dotnet-example:not-linky ./not-linky"
pe "docker run --rm dotnet-example:not-linky"

banner "Let's migrate it to a Chainguard image."
pe "git diff --no-index -U1000 ./not-linky/Dockerfile ./linky/Dockerfile"
pe "docker build -t dotnet-example:linky ./linky"
pe "docker run --rm dotnet-example:linky"

banner "It should be a bit smaller."
pe "docker images dotnet-example"

banner "And have significantly less vulnerabilities."
pe "grype dotnet-example:not-linky"
pe "grype dotnet-example:linky"
