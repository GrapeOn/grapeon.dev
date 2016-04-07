<?php
?>
<?php
require '../bootstrap.php';

//redirect if not logged in!
if (!isset($_SESSION['LOGGED_IN_USER'])) {
		header("Location: http://grapeon.dev/auth.login.php");
		exit();
	}

$stmt = $dbc->prepare("SELECT * FROM ad_table");
$stmt->execute();
$ads_array = $stmt->fetchAll(PDO::FETCH_ASSOC);


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

<form method="POST" action="ads.upload.php" enctype="multipart/form-data">
	<label for="discount_name">Discount name</label><br>
	<input type="text" name="discount_name" id="discount_name">
	<br><br>
	<label for="description">A quick description!</label><br>
	<textarea rows="5" name="description" id="description"></textarea>
	<br><br>
	<!--radio buttons for category-->
		<label for="category">Select a category!</label><br>
		<input type="radio" name="category" value="wine"> wine<br>
		<input type="radio" name="category" value="juice"> juice<br>
		<input type="radio" name="category" value="grapes"> grapes<br>

		<input type="radio" name="category" value="raisins"> raisins<br>
		<input type="radio" name="category" value="jelly"> jelly<br>
		<input type="radio" name="category" value="event"> event<br>
	<!--END radio buttons for category-->
	<br><br>
	<label for="percent_off">Percent off</label>
	<input type="text" name="percent_off" id="percent_off">%
	<br><br>
	<label for="start_date">Start date (YYYY-MM-DD)</label><br>
	<input type="text" name="start_date" id="start_date">
	<br><br>
	<label for="end_date">End date (YYYY-MM-DD)</label><br>
	<input type="text" name="end_date" id="end_date">
	<br><br>
	<label for="business_name">Business or location name</label><br>
	<input type="text" name="business_name" id="business_name">
	<br><br>
	<label for="business_address">Street address</label><br>
	<input type="text" name="business_address" id="business_address">
	<br><br>
	<label for="zip_code">Zip code</label><br>
	<input type="text" name="zip_code" id="zip_code">
	<br><br>
	<label for="img">Upload an image!</label>
	<input type="file" name="img" id="img">
    <br>
	<button type="submit">Grape Job!</button>
</form>
<?php require_once '../views/partials/footer.php'; ?>


</body>
</html>