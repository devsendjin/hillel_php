<?php

$dsn = 'pgsql:host=postgresContainer;dbname=postgres;port=5432';
$username = 'postgres';
$password = '1';

$dbh = new PDO($dsn, $username, $password);

