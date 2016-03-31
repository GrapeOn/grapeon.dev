<?php

//NOTE: our table will be called ad_table

require_once('boostrap.php');

$truncator = <<<QUERY
TRUNCATE ad_table;
QUERY;
$connection->exec($truncator);

$ads_array = [
	[
		'discount_name' => 'Half Off All Grapes at Grape Parade!',
		'description' => 'Swing by Grape Parade and sink your teeth into this truly purple deal! 50% off all grapes! (DISCLAIMER: DOES NOT INCLUDE GREEN GRAPES)'
		'percent_off' => 50,
		'start_date' => '2016-02-15',
		'end_date' => '2016-04-01',
		'date_added' => '2015-03-31',
		'business_name' => 'Grape Parade',
		'business_address' => '69 Purple Pit Place',
		'zip_code' => '11221',
		'img' => 'grape_parade.png'
	],
	[
		'discount_name' => 'Free Grape Juggling Demo in the Park',
		'description' => 'A nice family-friendly demo on how to juggle up to two (2) grapes. Come meet Gregg Grapeson, grape juggling prodigy, and maybe even get an autograph! ()'
		'percent_off' => 100,
		'start_date' => '2016-06-15',
		'end_date' => '2016-06-15',
		'date_added' => '2016-02-01',
		'business_name' => 'Grape Parade',
		'business_address' => '69 Purple Pit Place',
		'zip_code' => '11221',
		'img' => 'gregg_grapeson.jpg'
	],
	[
		'discount_name' => 'Drink 5 Bottles of Wine, Get Your Stomach Pumped for 75% Off!',
		'description' => 'Will you accept this challenege? Down 5 bottles of wine to prove your worth as a human being -- AND get 75% off having your stomach pumped afterwards!'
		'percent_off' => 75,
		'start_date' => '2016-06-15',
		'end_date' => '2016-07-15',
		'date_added' => '2016-04-10',
		'business_name' => 'Vineman''s Wine Bar & Regret Emporium',
		'business_address' => '114 Grapeson Pit',
		'zip_code' => '11221',
		'img' => 'wine_chug.jpg'
	],
	[
		'discount_name' => '25% Off All Grapeskin Tuxedos',
		'description' => 'You''re gonna like the way you look! -- in one of our avante-garde grapeskin tuxedos.'
		'percent_off' => 25,
		'start_date' => '2016-08-01',
		'end_date' => '2016-09-01',
		'date_added' => '2016-01-01',
		'business_name' => 'Mens'' Wearhouse' ,
		'business_address' => '8 Grapewiggle Terrace',
		'zip_code' => '11221',
		'img' => 'grapeskin_suit.jpg'
	]
]

//prepare statements inserting into ad_table table
$query "INSERT INTO ad_table (discount_name, description, start_date, end_date, date_added, business_name, business_address, zip_code, img) VALUES (:discount_name, :description, :start_date, :end_date, :date_added, :business_name, :business_address, :zip_code, :img)";


//now bind them!
foreach ($ads_array as $ad) {
	$stmt->bindValue(':discount_name', $ad['discount_name'], PDO::PARAM_STR);
	$stmt->bindValue(':description', $ad['description'], PDO::PARAM_STR);
	$stmt->bindValue(':percent_off', $ad['percent_off'], PDO::PARAM_INT);
	$stmt->bindValue(':start_date', $ad['start_date'], PDO::PARAM_STR);
	$stmt->bindValue(':end_date', $ad['end_date'], PDO::PARAM_STR);
	$stmt->bindValue(':date_added', $ad['date_added'], PDO::PARAM_STR);
	$stmt->bindValue(':business_name', $ad['business_name'], PDO::PARAM_STR);
	$stmt->bindValue(':business_address', $ad['business_address'], PDO::PARAM_STR);
	$stmt->bindValue(':zip_code', $ad['zip_code'], PDO::PARAM_STR);
	$stmt->bindValue(':img', $ad['img'], PDO::PARAM_STR);

	$stmt->execute();
}
