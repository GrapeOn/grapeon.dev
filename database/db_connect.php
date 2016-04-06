<?php


//constants defined
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASSWORD', $_ENV['DB_PASS']);
define('DB_HOST', $_ENV['DB_HOST']);

//create database connection
$dbc = new PDO(
	'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
	DB_USER,
	DB_PASSWORD
);

//throw exceptions
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);