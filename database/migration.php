<?php

//require db connection file!
require_once('db_connect.php');

//drop ad_table if exists
$dropTable = <<<QUERY
	DROP TABLE IF EXISTS ad_table
QUERY;
$dbc->exec($dropTable);
//creates ad_table
$createTable = <<<QUERY
	CREATE TABLE ad_table(
		ad_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		discount_name CHAR(100) NOT NULL,
		description TEXT NOT NULL,
		percent_off INT NOT NULL,
		start_date DATE NOT NULL,
		end_date DATE NOT NULL,
		date_added DATE NOT NULL,
		business_name CHAR(100) NOT NULL,
		business_address CHAR(200) NOT NULL,
		zip_code INT NOT NULL,
		img CHAR(200) NOT NULL,
		category CHAR(20) NOT NULL,
		PRIMARY KEY(ad_id)
	)
QUERY;

$dbc->exec($createTable);