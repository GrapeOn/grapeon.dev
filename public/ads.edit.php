<?php

require_once '../bootstrap.php';

$grape = [];

if (isset($_GET['ad_id'])) {
	
	$id = $_GET['ad_id'];

	$grape = Ad::find($id);
	if (empty($grape)) {
		header('Location: ads.edit.php?ad_id=1');
	}
} else 
{
	header('Location: ads.edit.php?ad_id=1');
}
var_dump($grape);
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
        <link rel="stylesheet" href="/css/main.css">
        <title>GrapeOn! - Wine, juice, grape, raisins</title>
        <meta name="description" content="GrapeOn provides local classifieds for grape products and grape events with food, drink, and vines">
    </head>
<body>
	<!--require page elements-->
	<?php require_once '../views/partials/navbar.php'; ?>
	<?php require_once '../views/partials/header.php'; ?>

<div class="container">
	<form method="POST" action="ads.index.php">
		<!--TO DO: Change the action to take them to their own new entry!-->
		<label for="discount_name">Discount name</label><br>
		<input type="text" name="discount_name" id="discount_name" value="<?= $grape->discount_name?>">  <!-- object not array, so use arrow -->
		<br><br>
		<label for="description">A quick description!</label><br>
		<textarea rows="5" name="description" id="description"><?= $grape->description?></textarea>
		<br><br>
		<!--radio buttons for category-->
			<label for="category">Select a category!</label><br>
			<input type="radio" name="category" value="wine" <?= $grape->category == "wine" ? 'checked="checked"': ''?>> wine<br>
			<input type="radio" name="category" value="juice" <?= $grape->category == "juice" ? 'checked="checked"': ''?>> juice<br>
			<input type="radio" name="category" value="grapes" <?= $grape->category == "grapes" ? 'checked="checked"': ''?>> grapes<br>
			<input type="radio" name="category" value="raisins" <?= $grape->category == "raisins" ? 'checked="checked"': ''?>> raisins<br>
			<input type="radio" name="category" value="jelly" <?= $grape->category == "jelly" ? 'checked="checked"': ''?>> jelly<br>
			<input type="radio" name="category" value="events" <?= $grape->category == "event" ? 'checked="checked"': ''?>> events<br>


		<!--END radio buttons for category-->
		<br><br>
		<label for="percent_off">Percent off</label>
		<input type="text" name="percent_off" id="percent_off" value="<?= $grape->percent_off?>">%
		<br><br>
		<label for="start_date">Start date (YYYY-MM-DD)</label><br>
		<input type="text" name="start_date" id="start_date" value="<?= $grape->start_date?>">
		<br><br>
		<label for="end_date">End date (YYYY-MM-DD)</label><br>
		<input type="text" name="end_date" id="end_date" value="<?= $grape->end_date?>">
		<br><br>
		<!--NOTE: date_added will be added to the user  through a PHP timestamp YYYY-MM-DD -->
		<label for="business_name">Business or location name</label><br>
		<input type="text" name="business_name" id="business_name" value="<?= $grape->business_name?>">
		<br><br>
		<label for="business_address">Street address</label><br>
		<input type="text" name="business_address" id="business_address" value="<?= $grape->business_address?>">
		<br><br>
		<label for="zip_code">Zip code</label><br>
		<input type="text" name="zip_code" id="zip_code" value="<?= $grape->zip_code?>">
		<br><br>
		<h1>IMAGE UPLOADER GOES HERE!</h1>
		<img src="/img/<?= $grape->img?>"> 
		<button type="submit">Grape Job!</button>
	</form>
</div> <!-- end container -->
	<?php require_once '../views/partials/footer.php'; ?>
</body>
</html>