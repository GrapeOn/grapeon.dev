<?php

require_once '../bootstrap.php';

$grape = [];

if (isset($_GET['ad_id'])) {
	
	$id = $_GET['ad_id'];
	
	$stmt = $dbc->query("SELECT * FROM ad_table WHERE ad_id = $id");

	$grape = $stmt->fetch(PDO::FETCH_ASSOC);

}
//var_dump($grape);
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
        <title>Browse Hot Dealz!</title>
        <meta name="description" content="GrapeOn provides local classifieds for grape products and grape events with food, drink, and vines">
</head>
<body>
	<?php require_once '../views/partials/navbar.php'; ?>
	<?php require_once '../views/partials/header.php'; ?>
	
	<h2>
		Take advantage of <?= $grape['discount_name']?>
	</h2>
	<h3>
		Submitted by <a href="users.profile.php?username=<?= $grape['submitted_by'] ?>"><?= $grape['submitted_by'] ?></a>
	</h3>
	<!-- <h3>
		This discount is <?= $grape['percent_off']?> % off!
	</h3> -->

	<h4 id="description">
		<?= $grape['description'] ?>
	</h4>
	<h4> 
		Grape this <?= $grape['business_name'] ?> deal at <?= $grape['business_address'] . ', ' . $grape['zip_code']?>
	
	<h5>
		Offer ends <?= $grape['end_date'] ?>
	</h5>
	<p>
		<img class="ad_image_show_page" src="/img/<?= $grape['img'] ?>"> 
	</p>

	<br>
		<a href="http://grapeon.dev/ads.index.php">Back to Listings</a>
	<br>

<?php require_once '../views/partials/footer.php'; ?>
</body>
</html>