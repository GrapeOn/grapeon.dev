<?php
require_once '../bootstrap.php';

$profileOf = $_GET['username'];

echo $profileOf;

$stmt = $dbc->query("SELECT * FROM user_table WHERE username = '$profileOf'");

$currentProfile = $stmt->fetch(PDO::FETCH_ASSOC);

// var_dump($currentProfile['join_date']);

$stmt = $dbc->query("SELECT * FROM ad_table WHERE submitted_by = 'margoober'");


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
        <link rel="stylesheet" href="/css/main.css">
        <title>Your Profile</title>
        <meta name="description" content="GrapeOn provides local classifieds for grape products and grape events with food, drink, and vines">
</head>
<body>
	<?php require_once '../views/partials/navbar.php'; ?>
	<?php require_once '../views/partials/header.php'; ?>
<div class="container">
	<img src="/img/<?= $currentProfile['avatar'] ?>">
	<h1><?= $currentProfile['username'] ?></h1>
	<h3><?= $currentProfile['first_name'] . ' ' . $currentProfile['last_name']?></h3>
	<h3><a href="ads.index.php?submitted_by=<?= $currentProfile['username'] ?>">Submission History</a></h3>
	<h3></h3>
</div><!--  container -->
	<?php require_once '../views/partials/footer.php'; ?>