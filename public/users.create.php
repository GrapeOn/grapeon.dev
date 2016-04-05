<?php
/*
GOALS:
user input gets pushed into users_table
*/
require '../bootstrap.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://code.jquery.com/jquery-2.2.2.min.js" integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="/img/favicon.ico" rel="icon" type="image/x-icon" />
        <title>GrapeOn! - Wine, juice, grape, raisins</title>
        <meta name="description" content="GrapeOn provides local classifieds for grape products and grape events with food, drink, and vines">
    </head>
<body>
	<!--require page elements-->
	<?php require_once '../views/partials/navbar.php'; ?>
	<?php require_once '../views/partials/header.php'; ?>
	<?php require_once '../views/partials/footer.php'; ?>

<form method="POST" action="users.show.php">
	<label for="first_name">First Name</label><br>
	<input type="text" name="first_name" id="first_name">
	<br><br>
	<label for="last_name">Last Name</label><br>
	<input type="text" name="last_name" id="last_name">
	<br><br>
	<label for="username">Username</label><br>
	<input type="text" name="username" id="username">
	<br><br>
	<label for="password">Password</label><br>
	<input type="password" name="password" id="password">
	<br><br>
	<label for="confirm_password">Confirm Password</label><br>
	<input type="password" name="confirm_password" id="confirm_password">
	<br><br>
	<label for="email_address">Email address</label><br>
	<input type="text" name="email_address" id="email_address">
	<br><br>

	<!--radio buttons for avatar-->
		<label for="avatar">Select an avatar!</label><br>
		<input type="radio" name="avatar" value="av1.jpg"> av1.jpg<br>
		<input type="radio" name="avatar" value="av2.jpg"> av2.jpg<br>
		<input type="radio" name="avatar" value="av3.jpg"> av3.jpg<br>

		<input type="radio" name="avatar" value="av4.jpg"> av4.jpg<br>
		<input type="radio" name="avatar" value="av5.jpg"> av5.jpg<br>
		<input type="radio" name="avatar" value="av6.jpg"> av6.jpg<br>
	<!--END radio buttons for avatar-->
		<button type="submit">ONE OF US!</button>
</form>

</body>
</html>