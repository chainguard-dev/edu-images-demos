# Devcontainer using Chainguard's go image

A minimal example of creating a Dev Container using a Chainguard distroless image.

If you added the .devcontainer folder (and contents) at the root of your repo, VS Code would detect it and prompt you to open in a Dev Container.

Instead, you can use Dev Containers: Open Folder in Container... and select this folder from command palette or quick actions. 

If you open a terminal you should see the path in the prompt is preceded by the ID of the docker container. eg:
```
8317a7ac6809:/workspaces/edu-images-demos/chainguard-go-devcontainer$ 
```

It may take a minute to build the image the first time you use it.

## Installing other tools

Because this is a distroless container, not all tools are installed. Especially `sudo`, meaning you cannot easily add packages or run commands as root.

If you need to add things to the running container, from your host machine you can use `docker` commands. eg to add sudo:

```
host$ docker exec -itu0 8317a7ac6809 bash
bash-5.2# apk add -q sudo-rs shadow
bash-5.2# echo "nonroot ALL = (ALL:ALL) NOPASSWD:ALL" >> /etc/sudoers
bash-5.2# echo y | pwck -q       
```

When you know what you need to install or run, add it to the Dockerfile in the .devcontainer directory so that it is present next time you run your Dev Container.

## SSH/GPG 
VSCode should take care of mounting your git config file into the container.

You will need to add your ssh keys to `ssh-add` on your host machine.

You may need to install gpg or gitsign for commit signing.

See [VS Code Advanced Containers](https://code.visualstudio.com/remote/advancedcontainers/sharing-git-credentials) for more information.