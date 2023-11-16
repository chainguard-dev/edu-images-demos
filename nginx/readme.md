# NGINX Demo Application Instructions

General overview of how to run the NGINX Demo application - for use in writing complete NGINX image guide at a later date

Begin by installing NGINX:

`brew install nginx`

*(Installation information is not the most helpful on nginx.org [https://nginx.org/en/docs/install.html] so I am including this since it helped me, but maybe the guide would want to skip over it)*

Create a directory for the demo application, and navigate to it:

`mkdir ~/nginxdemo/ && cd $_`

Within this directory, create a `data` directory, and navigate to it:

`mkdir data && cd $_`

Three files for the demo app are created, and go into this `data` directory:
1. `nano index.html` (copy the HTML from the demo here)

2. `nano stylesheet.css` (copy the CSS from the demo here)

3. `curl -O https://raw.githubusercontent.com/chainguard-dev/edu-images-demos/734e6171ee69f0e0dbac95e6ebc1759ac18bf00a/nginx/data/inky.png` (this is the picture of Inky rendered in the HTML)

Within the `nginxdemo` folder, create the `nginx.conf` file:

`nano nginx.conf`

... and copy in the configuration info from the NGINX demo repo. Be sure to replace the file path on line 30 with the appropriate file path to your local `data` directory!

also, create the `mime.types` file:
`nano mime.types`
... and copy in the info from the demo repo

Under `nginxdemo`, create a new directory `logs` and navigate to it:

`mkdir logs && cd $_`

within the directory, create the `access.log` file

`mkfile b access.log`

This is required by NGINX to run the config file, used to dump logs

To run the demo, run `nginx -c filepath`,
where the filepath is replaced by the location of the `nginx.conf` file created in this demo.

To view the local webserver, navigate to `localhost:8080` in your web browser of choice. To reload the configuration file to account for any changes to the configuration, or changes to the HTML content, you can run `nginx -s reload` in your terminal. To stop NGINX, you can run `nginx -s quit` to safely exit.
