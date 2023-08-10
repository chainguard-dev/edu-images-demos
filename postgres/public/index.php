<?php

$dbconn = pg_connect("host=postgres dbname=php-test user=php password=password")
or die('Could not connect: ' . pg_last_error());

$createTable = pg_query("
    CREATE TABLE if not exists data (data_key varchar(20), data_value varchar(20))
    ") or die('Query failed: ' . pg_last_error());

$insertIntoTable = pg_query("
    INSERT INTO data VALUES ('code', '" . rand(1000,9000) . "')
") or die('Query failed: ' . pg_last_error());

$query = pg_query("SELECT * FROM data");

while ($row = pg_fetch_array($query, null, PGSQL_ASSOC)) {
    echo "<pre>";
    print_r($row);
    echo "</pre>";
}