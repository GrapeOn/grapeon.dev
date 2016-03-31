<?php


//constants defined
define('DB_NAME', 'grapes_db');
define('DB_USER', 'grape');
define('DB_PASSWORD', 'grape');
define('DB_HOST', '127.0.0.1');

//create database connection
$dbc = new PDO(
	'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
	DB_USER,
	DB_PASSWORD
);

//throw exceptions
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);