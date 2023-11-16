# NGINX Demo Application Instructions

General overview of how to run the NGINX Demo application - for use in writing complete NGINX application artist

Begin by installing NGINX:
`brew install nginx`
* Including this because installation information is not the most helpful on nginx.org [https://nginx.org/en/docs/install.html]

Create a directory for the demo application:
`mkdir ~/nginxdemo/ && cd $_`

Within this directory, create a `data` directory:
`mkdir data && cd $_`

Three files for the demo app:
1. `nano index.html` (copy the html from the demo here)

2. `nano stylesheet.css` (copy the css from the demo here)

3. `curl -0 https://raw.githubusercontent.com/chainguard-dev/edu-images-demos/nginx/nginx/nginxdemo/data/inky.png`

Within the `nginxdemo` folder, create the `nginx.conf` file:
`nano nginx.conf`
... and copy in the configuration info from the NGINX demo repo

also, create the `mime.types` file:
`nano mime.types`
... and copy in the info from the demo repo

Under `nginxdemo`, create a new directory `logs`
`mkdir logs && cd $_`
within the directory, create a file
`mkfile b access.log`

To run the demo, run `nginx -c filepath`
where the filepath is replaced by the location of the `nginx.conf` file created in this demo

