# NGINX Demo Application Instructions

* this is incomplete and untested

Begin by installing NGINX
`brew install nginx`
* for Homebrew, but might need to reference instructions for other options

Create a directory for the demo application
`mkdir ~/nginxdemo/ && cd $_`

Within this directory, create a `data` directory.
`mkdir data && cd $_`

Three files for the demo app
`nano index.html`
copy the html from the demo here

`nano stylesheet.css`
copy the css from the demo here

`curl -0 <link to inky.png>`

Within the `nginxdemo` folder, create the `nginx.conf` file
`nano nginx.conf`
and copy in the configuration info from the demo

Create `mime.types`
`nano mime.types`
and copy in the info from the demo

Create a new directory `logs`
`mkdir logs && cd $_`
within the directory, create a file
`mkfile b access.log`

To run the demo, run `nginx -c <file path to config file>`

