# wolfi-php-demo
This is a demo of a LEMP (Linux, (E)Nginx, MariaDB and PHP-FPM) environment all based on Wolfi Chainguard Images. It uses Docker Compose to manage the environment.

## Running it

You'll need Docker to run this demo.

After cloning this repository to your local system, run the following command to bring the environment up:

```shell
docker compose up
```

This will spin up three containers: the `app` container, the `mariadb` container, and te `nginx` container. These will run as services. 

Once the environment is up, you can visit `localhost:8000` to check the demo. The `index.php` file has a basic code that:

1) connects to the mariadb server;
2) creates a new table called `data` if that doesn't exist yet;
3) inserts a new entry on the table, with a random number;
4) queries the table to show all entries.

Every time you reload the page, a new entry will be added to the table.

There's also a `info.php` file with information from the environment for your reference.