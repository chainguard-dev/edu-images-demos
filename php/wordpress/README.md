# WordPress Chainguard Image Demos

This directory contains a set of demos that show how to use the ChainGuard WordPress Image.

All demos use Docker Compose to set up a LEMP environment composed by three services: PHP-FPM*, MariaDB and Nginx. The environment variables are set in a `.env` file that is included in each demo and can be modified to suit your needs.

*The WordPress image has PHP-FPM built-in.

## 01-preview
This is a quick demo that demonstrates how to set up a new WordPress install using environment variables to set your `wp-config.php` file. Changes made to the installation such as custom themes and plugins won't be persisted through container rebuilds.

```shell
cd 01-preview
docker compose up
```

You can navigate to `localhost:8000` in your browser to go through the regular WordPress installation wizard and test the image. To stop the containers, press `Ctrl+C` in the terminal where you ran the `docker compose up` command. To destroy the containers, run `docker compose down`.

## 02-customizing
This demo uses a custom Dockerfile to set up a system user that will allow you to persist changes made to the WordPress installation by creating a volume that will share the contents of the `wp-content` folder with your host machine. This way, even if you remove the containers, the content will persist in your local `wp-content` folder, allowing you to copy any custom themes and plugins to a permanent location.

```shell
cd 02-customizing
docker compose up --build
```
You can navigate to `localhost:8000` in your browser to go through the regular WordPress installation wizard and test the image. To stop the containers, press `Ctrl+C` in the terminal where you ran the `docker compose up` command. To destroy the containers, run `docker compose down`.

## 03-distroless
This demo uses a multi-stage Docker build to create a final Distroless image to reduce the image size and improve security. The Distroless image is a minimal image that only contains the necessary dependencies to run WordPress and won't allow for new package installations, reducing the attack surface.

The main difference here is that we're calling the entrypoint script at **build time** instead of run time. This is done to ensure the image is self-contained and doesn't rely on volumes set up within the host machine in order to work. Any customizations should be included in the `wp-content` folder that will be copied to the image at build time. The resulting runtime relies on a set of environment variables to configure database access.

This demo includes a theme ([cue](https://wordpress.org/themes/cue/), a simple blogging theme) and a plugin ([imsanity](https://wordpress.org/plugins/imsanity/), a popular plugin used to resize images) to demonstrate how to include custom content in the image.

```shell
cd 03-distroless
docker compose up --build
```
You can navigate to `localhost:8000` in your browser to go through the regular WordPress installation wizard and test the image. To stop the containers, press `Ctrl+C` in the terminal where you ran the `docker compose up` command. To destroy the containers, run `docker compose down`.