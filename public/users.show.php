<?php

require_once '../bootstrap.php';
var_dump($_SESSION);

//redirect to login page if a session is not active
if (!isset($_SESSION['LOGGED_IN_USER'])) {
		header("Location: http://grapeon.dev/auth.login.php");
		exit();
	}

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
	$newUser->password = password_hash(Input::get('password'), PASSWORD_DEFAULT);
	$newUser->email_address = Input::get('email_address');
	$newUser->avatar = Input::get('avatar');
	$newUser->join_date = date('Y-m-d');

	var_dump($newUser);

	$newUser->save();
}


//create select statement that SELECTs * FROM user_table WHERE username = $_SESSION['LOGGED_IN_USER'];
	
	$currentUser = $_SESSION['LOGGED_IN_USER'];
	
	$stmt = $dbc->query("SELECT * FROM user_table WHERE username = '$currentUser'");

	$currentProfile = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($currentProfile);
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
        <title>Your Profile</title>
        <meta name="description" content="GrapeOn provides local classifieds for grape products and grape events with food, drink, and vines">
</head>
<body>
	<?php require_once '../views/partials/navbar.php'; ?>
	<?php require_once '../views/partials/header.php'; ?>
	<?php require_once '../views/partials/footer.php'; ?>

	<table>
		<tr>
			<td>
				<img src="/img/<?= $currentProfile['avatar'] ?>">
			</td>
			<td>
				<h1><?= $currentProfile['username'] ?></h1>
			</td>
		</tr>
		<tr>
			<td>
				<h3><?= $currentProfile['first_name'] ?></h3>
			</td>
			<td>
				<h3><?= $currentProfile['last_name'] ?></h3>
			</td>
		</tr>
		<tr>
			<td>
				<h3><?= $currentProfile['email_address'] ?></h3>
			</td>
			<td>
				<h3>You're User Number <?= $currentProfile['user_id'] ?>!</h3>
			</td>
		</tr>
	</table>

	

</body>
</html>