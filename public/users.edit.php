<?php
/*
GOALS:
user input gets pushed into users_table
*/
require '../bootstrap.php';

//this redirects logged in users away from user creation
if (!isset($_SESSION['LOGGED_IN_USER'])) {
	header("Location: http://grapeon.dev/auth.login.php");
	exit();
}
	$username = $_SESSION['LOGGED_IN_USER'];

	$grape = User::findByUsername($username);
	
	if (empty($grape)) {
		header('Location: auth.login.php');
	}
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


<form method="POST" action="users.edit.php">
	<table>
		<tr>
			<td>
				<label for="first_name">First Name</label><br>
				<input type="text" name="first_name" id="first_name" value="<?= $grape->first_name?>">
			</td>
			<td>
				<label for="last_name">Last Name</label><br>
				<input type="text" name="last_name" id="last_name" value="<?= $grape->last_name?>">
			</td>
			<td>
				<label for="email_address">Email address</label><br>
				<input type="text" name="email_address" id="email_address" value="<?= $grape->email_address?>">
			</td>
		</tr>
		<tr>
			<td>
				<label for="username">Username</label><br>
				<input type="text" name="username" id="username" value="<?= $grape->username?>">
			</td>
			<td>
				<label for="password">Password</label><br>
				<input type="password" name="password" id="password">
			</td>
			<td>
				<label for="confirm_password">Confirm Password</label><br>
				<input type="password" name="confirm_password" id="confirm_password">
			</td>
		</tr>
	</table>
	<!--radio buttons for avatar property-->
	<label for="avatar">Select an avatar!</label><br>

	<table>
		<tr>
			<td>
				<input type="radio" name="avatar" value="av1.png" <?= $grape->avatar == "av1.png" ? 'checked="checked"': ''?>> <img class="avatar" src="/img/av1.png">
			</td>
			<td>
				<input type="radio" name="avatar" value="av2.png" <?= $grape->avatar == "av2.png" ? 'checked="checked"': ''?>> <img class="avatar" src="/img/av2.png">
			</td>
			<td>
				<input type="radio" name="avatar" value="av3.png" <?= $grape->avatar == "av3.png" ? 'checked="checked"': ''?>> <img class="avatar" src="/img/av3.png">
			</td>
		</tr>
		<tr>
			<td>
				<input type="radio" name="avatar" value="av4.png" <?= $grape->avatar == "av4.png" ? 'checked="checked"': ''?>> <img class="avatar" src="/img/av4.png">
			</td>
			<td>
				<input type="radio" name="avatar" value="av5.png" <?= $grape->avatar == "av5.png" ? 'checked="checked"': ''?>> <img class="avatar" src="/img/av5.png">
			</td>
			<td>
				<input type="radio" name="avatar" value="av6.png" <?= $grape->avatar == "av6.png" ? 'checked="checked"': ''?>> <img class="avatar" src="/img/av6.png">
			</td>
		</tr>
	</table>
	<!--END radio buttons for avatar-->
	<br>
	<button type="submit">ONE OF US!</button>
</form>
	<?php require_once '../views/partials/footer.php'; ?>
</body>
</html>