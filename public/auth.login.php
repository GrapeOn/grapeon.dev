<?php
require_once '../bootstrap.php';

// var_dump($_SESSION['LOGGED_IN_USER']);

// allows us to use a $_SESSION superglobal

function pageController()

	{
		$username = Input::has('username') ? Input::get('username') : '';
		$password = Input::has('password') ? Input::get('password'): '';

		$result = Auth::attempt($username, $password);
		if($result) {
			header('Location: ads.index.php');
			// die();
		} else if ($username != '' || $password != '') {
	echo ("Incorrect info. Try again :)");
	}
	 return array (
		'username' => $username,
		'password' => $password,
		'result' => $result
		);
}
extract(pageController());
?>


<!DOCTYPE html>
<html>
<head>
    <title>GrapeOn Log in page</title>
     <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://code.jquery.com/jquery-2.2.2.min.js" integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="/img/favicon.ico" rel="icon" type="image/x-icon" />
        <meta name="description" content="GrapeOn provides local classifieds for grape products and grape events with food, drink, and vines">
        <link rel="stylesheet" href="/css/main.css">
</head>
<body>
	<?php require_once '../views/partials/navbar.php'; ?>
	<?php require_once '../views/partials/header.php'; ?>
	<div class="container">
	    <form method="POST">
	        <a href="users.create.php">Not a user?</a><br><br>
	        <label>User Name</label>
	        <input type="text" name="username" value="<?= Input::escape($username)?>"><br>
	        <label>Password</label>
	        <input type="password" name="password" value="<?= Input::escape($password)?>"><br>
	        <input type="submit">
	    </form>
	    <?php require_once '../views/partials/footer.php'; ?>
	</div><!--  close container -->
</body>
</html>