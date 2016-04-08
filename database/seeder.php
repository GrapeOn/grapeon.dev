<?php

//NOTE: our table will be called ad_table

require_once('db_connect.php');

$truncator = <<<QUERY
TRUNCATE ad_table;
QUERY;
$dbc->exec($truncator);

$ads_array = [
	[
		'discount_name' => 'Half Off All Grapes at Grape Parade!',
		'description' => 'Swing by Grape Parade and sink your teeth into this truly purple deal! 50% off all grapes! (DISCLAIMER: DOES NOT INCLUDE GREEN GRAPES)',
		'percent_off' => 50,
		'start_date' => '2016-02-15',
		'end_date' => '2016-04-01',
		'date_added' => '2015-03-31',
		'business_name' => 'Grape Parade',
		'business_address' => '69 Purple Pit Place',
		'zip_code' => 11221,
		'img' => 'grape_parade.png',
		'category' => "event",
		'submitted_by' => 'margoober'
	],
	[
		'discount_name' => 'Free Grape Juggling Demo in the Park',
		'description' => 'A nice family-friendly demo on how to juggle up to two (2) grapes. Come meet Gregg Grapeson, grape juggling prodigy, and maybe even get an autograph! ()',
		'percent_off' => 100,
		'start_date' => '2016-06-15',
		'end_date' => '2016-06-15',
		'date_added' => '2016-02-01',
		'business_name' => 'Grape Parade',
		'business_address' => '69 Purple Pit Place',
		'zip_code' => 11221,
		'img' => 'gregg_grapeson.jpg',
		'category' => "event",
		'submitted_by' => 'margoober'
	],
	[
		'discount_name' => 'Drink 5 Bottles of Wine, Get Your Stomach Pumped for 75% Off!',
		'description' => 'Will you accept this challenege? Down 5 bottles of wine to prove your worth as a human being -- AND get 75% off having your stomach pumped afterwards!',
		'percent_off' => 75,
		'start_date' => '2016-06-15',
		'end_date' => '2016-07-15',
		'date_added' => '2016-04-10',
		'business_name' => 'Vineman\'s Wine Bar & Regret Emporium',
		'business_address' => '114 Grapeson Pit',
		'zip_code' => 11221,
		'img' => 'wine_chug.jpg',
		'category' => "event",
		'submitted_by' => 'margoober'
	],
	[
		'discount_name' => '25% Off All Grapeskin Tuxedos',
		'description' => 'You\'re gonna like the way you look! -- in one of our avante-garde grapeskin tuxedos.',
		'percent_off' => 25,
		'start_date' => '2016-08-01',
		'end_date' => '2016-09-01',
		'date_added' => '2016-01-01',
		'business_name' => 'Mens\' Wearhouse' ,
		'business_address' => '8 Grapewiggle Terrace',
		'zip_code' => 11221,
		'img' => 'grapeskin_suit.jpg',
		'category' => "event",
		'submitted_by' => 'margoober'
	],
		[
		'discount_name' => '50% Off Tickets 2 The Raisin Rager',
		'description' => 'We\'ll be RAISIN the roof here. Come dance til you sweat yourself dry & shrivel up (but don\'t die!).',
		'percent_off' => 50,
		'start_date' => '2016-09-01',
		'end_date' => '2016-10-01',
		'date_added' => '2016-04-04',
		'business_name' => 'Dry Grape Discoteque and Grindhouse' ,
		'business_address' => '9 Heck Hole Plaza',
		'zip_code' => 78212,
		'img' => 'raisin_rager.jpg',
		'category' => "event",
		'submitted_by' => 'margoober'
	],
	[
		'discount_name' => 'Free Juice Binge',
		'description' => 'Grape Juice guzzle. Three days str8. Free of charge.',
		'percent_off' => 100,
		'start_date' => '2016-10-01',
		'end_date' => '2016-10-03',
		'date_added' => '2016-04-04',
		'business_name' => 'Purple Lips Chughouse' ,
		'business_address' => '198 Juice Jump Lane',
		'zip_code' => 78212,
		'img' => 'juice_binge.jpg',
		'category' => "juice",
		'submitted_by' => 'margoober'
	],
	[
		'discount_name' => '10% Off Jelly Massage',
		'description' => 'Long day at the office? Let our jelly specialists marinate your tense back & shoulders in our artisinal jelly blends.',
		'percent_off' => 100,
		'start_date' => '2016-01-01',
		'end_date' => '2016-10-03',
		'date_added' => '2016-04-04',
		'business_name' => 'Smooth Jelly Massage Palace' ,
		'business_address' => '3 Jamwiggle Terrace',
		'zip_code' => 78212,
		'img' => 'jelly_massage.png',
		'category' => 'jelly',
		'submitted_by' => 'jellydaddy420'
	],
	[
		'discount_name' => 'Grape & Go Seek',
		'description' => 'Head out to the grape vineyard for a fun game of Grape & Go Seek with Phil \'Green Grapes\' McGovern, World G&GS (Grape & Go Seek) Champion.',
		'percent_off' => 100,
		'start_date' => '2016-06-01',
		'end_date' => '2016-06-03',
		'date_added' => '2016-04-04',
		'business_name' => 'Bexar County Vineyards' ,
		'business_address' => '90 Vineyards Highway',
		'zip_code' => 78212,
		'img' => 'grape_and_seek.jpg',
		'category' => 'event',
		'submitted_by' => 'margoober'
	],
	[
		'discount_name' => '33% Off Jelly Mess Cleanup Services',
		'description' => 'In a jam? Had a spill? Broken glass and your favorite jelly all over the floor? For a limited time get 33.33% off of jelly cleanup sessions conducted by our Jelly Mess Cleanup Services Task Force.',
		'percent_off' => 33,
		'start_date' => '2016-08-01',
		'end_date' => '2016-11-03',
		'date_added' => '2016-04-09',
		'business_name' => 'Jelly Mess Cleanup Services' ,
		'business_address' => '10 Jam Town Jiggleway',
		'zip_code' => 78212,
		'img' => 'jellyMess.png',
		'category' => 'jelly',
		'submitted_by' => 'jellydaddy420'
	],
	[
		'discount_name' => 'Papyrus Brand Jelly Portable Jam Packs for Teens Who Are \'On The Go\' -- Half Off',
		'description' => 'Teens -- are you tired of your lame parent saying \'no\' to your \'On The GO\' lifestyle? Say \'I\'m SICK of your HECKING RULES\' with these limited time offer On The Go Portable Jam Capsules!',
		'percent_off' => 50,
		'start_date' => '2016-08-01',
		'end_date' => '2016-11-03',
		'date_added' => '2016-04-09',
		'business_name' => 'Papyrus Brand Jelly' ,
		'business_address' => '100 Teen Town Drive',
		'zip_code' => 78212,
		'img' => 'papyrusJelly.png',
		'category' => 'jelly',
		'submitted_by' => 'jellydaddy420'
	],
	[
		'discount_name' => 'Cinnamon Raisin Bread -- Clearance Sale 75% Off',
		'description' => 'Sink your hungry teeth into some of our famous Cinnamon Raisin Bread at a quarter the cost!',
		'percent_off' => 75,
		'start_date' => '2016-08-01',
		'end_date' => '2016-11-03',
		'date_added' => '2016-04-09',
		'business_name' => 'Raisin You Right Bakery',
		'business_address' => '11 Brown Bread Boulevard',
		'zip_code' => 78212,
		'img' => 'raisinbread.png',
		'category' => 'raisins',
		'submitted_by' => 'margoober'
	],
	[
		'discount_name' => '20% Off Raisin Rehydration Services',
		'description' => 'Mother nature got your grapes all dried up? Turn those sad little raisins back into grapes with the help of our Raisin Rehydration & Rescue Task Force.',
		'percent_off' => 75,
		'start_date' => '2016-08-01',
		'end_date' => '2016-11-03',
		'date_added' => '2016-04-09',
		'business_name' => 'Raisin Rehydration, LLC',
		'business_address' => '11 Dry Bones Drive',
		'zip_code' => 78212,
		'img' => 'raisin_rehydration.png',
		'category' => 'raisins',
		'submitted_by' => 'margoober'
	],
	[
		'discount_name' => 'Grapes by the Gallon!',
		'description' => 'Limited time grapes by the gallon offer at Grape City! Prices cut by up to 70%!',
		'percent_off' => 70,
		'start_date' => '2016-09-01',
		'end_date' => '2016-12-03',
		'date_added' => '2016-04-09',
		'business_name' => 'Grape City',
		'business_address' => '11 Purple Place',
		'zip_code' => 78212,
		'img' => 'grapesbythegallon.png',
		'category' => 'grapes',
		'submitted_by' => 'margoober'
	],
	[
		'discount_name' => 'Grape Guzzle Launch Party - Free Grape Smoothies!',
		'description' => 'Come check out Grape Guzzle! Free grape smoothies for our May 18th opening celebration! Purple lips included.',
		'percent_off' => 100,
		'start_date' => '2016-05-18',
		'end_date' => '2016-05-18',
		'date_added' => '2016-04-20',
		'business_name' => 'Grape Guzzle',
		'business_address' => '22 Vine Time Lane',
		'zip_code' => 78212,
		'img' => 'grape_smoothie.png',
		'category' => 'grapes',
		'submitted_by' => 'margoober'
	],
	[
		'discount_name' => 'Feed Grapes to Baby Foxes!',
		'description' => 'Bring your family to the San Antonio Zoo to let them feed grapes to tiny foxes -- for free! This is a special celebration of the arrival of our new family of tiny forest foxes. Très bien!',
		'percent_off' => 100,
		'start_date' => '2016-10-01',
		'end_date' => '2016-12-30',
		'date_added' => '2016-04-09',
		'business_name' => 'San Antonio Zoo',
		'business_address' => '3903 N St Mary\'s St',
		'zip_code' => 78212,
		'img' => 'grape_fox.png',
		'category' => 'grapes',
		'submitted_by' => 'margoober'
	],
	[
		'discount_name' => '50% Grape Costumes For Doggos',
		'description' => 'Dress your pooch up in style this Halloween! Half off all grape costumes for doggos. This is one spooky deal!',
		'percent_off' => 100,
		'start_date' => '2016-10-01',
		'end_date' => '2016-10-31',
		'date_added' => '2016-09-09',
		'business_name' => 'Party Palace',
		'business_address' => '23 Commerce Street',
		'zip_code' => 78212,
		'img' => 'grape_dog.png',
		'category' => 'grapes',
		'submitted_by' => 'jellydaddy420'
	]
];

//prepare statements inserting into ad_table table
$query = "INSERT INTO ad_table (discount_name, description, percent_off, start_date, end_date, date_added, business_name, business_address, zip_code, img, category, submitted_by) VALUES (:discount_name, :description, :percent_off, :start_date, :end_date, :date_added, :business_name, :business_address, :zip_code, :img, :category, :submitted_by)";

$stmt = $dbc->prepare($query);

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
	$stmt->bindValue(':category', $ad['category'], PDO:: PARAM_STR);
	$stmt->bindValue(':submitted_by', $ad['submitted_by'], PDO:: PARAM_STR);

	$stmt->execute();
}




//create user dummy data!



$truncator = <<<QUERY
TRUNCATE user_table;
QUERY;
$dbc->exec($truncator);

$users_array = [
	[
		'first_name' => 'Margot',
		'last_name' => 'McMahon',
		'username' => 'margoober',
		'password' => password_hash('closetome', PASSWORD_DEFAULT),
		'email_address' => 'amcmahon@nes.ru',
		'avatar' => 'av1.png',
		'join_date' => '2016-04-05'
	],
	[
		'first_name' => 'Gaston',
		'last_name' => 'Lenotre',
		'username' => 'jellydaddy420',
		'password' => password_hash('iloveENERGYDRINKS', PASSWORD_DEFAULT),
		'email_address' => 'gaston@hotmail.com',
		'avatar' => 'av2.png',
		'join_date' => '2016-04-05'
	],
	[
		'first_name' => 'Vines',
		'last_name' => 'McShirt',
		'username' => 'grapelover1',
		'password' => password_hash('bobo', PASSWORD_DEFAULT),
		'email_address' => 'snails@gmail.com',
		'avatar' => 'av4.png',
		'join_date' => '2016-04-05'
	],
	[
		'first_name' => 'Greeg',
		'last_name' => 'Grapeson',
		'username' => 'grapelover2',
		'password' => password_hash('bobo', PASSWORD_DEFAULT),
		'email_address' => 'snails2@gmail.com',
		'avatar' => 'av3.png',
		'join_date' => '2016-04-01'
	]

];

//prepare statements inserting into ad_table table
$query = "INSERT INTO user_table (first_name, last_name, username, password, email_address, avatar, join_date) VALUES (:first_name, :last_name, :username, :password, :email_address, :avatar, :join_date)";

$stmt = $dbc->prepare($query);

//now bind them!
foreach ($users_array as $user) {
	$stmt->bindValue(':first_name', $user['first_name'], PDO::PARAM_STR);
	$stmt->bindValue(':last_name', $user['last_name'], PDO::PARAM_STR);
	$stmt->bindValue(':username', $user['username'], PDO::PARAM_INT);
	$stmt->bindValue(':password', $user['password'], PDO::PARAM_STR);
	$stmt->bindValue(':email_address', $user['email_address'], PDO::PARAM_STR);
	$stmt->bindValue(':avatar', $user['avatar'], PDO::PARAM_STR);
	$stmt->bindValue(':join_date', $user['join_date'], PDO::PARAM_STR);

	$stmt->execute();
}









