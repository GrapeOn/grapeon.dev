<?php

require_once '../bootstrap.php';
var_dump($_POST);

if (
		(Input::get('first_name', "") != "")
        && (Input::get('last_name', "") != "")
        && (Input::get('username', "") != "")
        && (Input::get('password', "") != "")
        && (Input::get('email_address', "") != "")
        && (Input::get('avatar', "") != "")
	) {
	echo "the POST supervariable has everthing it needs! this is a legit new user" . PHP_EOL;
	$newUser = new User();
	$newUser->first_name = Input::get('first_name');
	$newUser->last_name = Input::get('last_name');
	$newUser->username = Input::get('username');
	$newUser->password = Input::get('password');
	$newUser->email_address = Input::get('email_address');
	$newUser->avatar = Input::get('avatar');
	$newUser->join_date = date('Y-m-d');

	var_dump($newUser);

	$newUser->save();
}
?>

<DOCTYPE! HTML>
<html>
<head>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://code.jquery.com/jquery-2.2.2.min.js" integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="/img/favicon.ico" rel="icon" type="image/x-icon" />
        <title>Browse Hot Dealz!</title>
        <meta name="description" content="GrapeOn provides local classifieds for grape products and grape events with food, drink, and vines">
</head>
<body>
	<?php require_once '../views/partials/navbar.php'; ?>
	<?php require_once '../views/partials/header.php'; ?>
	<?php require_once '../views/partials/footer.php'; ?>

	<h1>Your New Profile</h1>

</body>
</html>