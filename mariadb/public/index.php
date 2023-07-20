<?php

$pdo = new PDO('mysql:host=mariadb;dbname=php-test;charset=utf8', 'php', 'password');

$createTable = $pdo->query("
    CREATE TABLE if not exists data (data_key varchar(20), data_value varchar(20))
    ");

$insertIntoTable = $pdo->query("
    INSERT INTO data VALUES ('code', '" . rand(1000,9000) . "')
");

$query = $pdo->query("SELECT * FROM data");

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo "<pre>";
    print_r($row);
    echo "</pre>";
}