<?php

require_once '../bootstrap.php';

var_dump($_FILES);
require_once '../utils/Uploader.php';

Uploader::uploadFunction();

$profilePic = $_FILES["img"]["name"];
//this conditional sets the image as a placeholder image if the user did not upload one.
if ($_FILES['img']['name'] == "") {
	$profilePic = "placeholderGrape.png";
}

if (
        (Input::get('discount_name', "") != "")
        && (Input::get('description', "") != "")
        && (Input::get('percent_off', "") != "")
        && (Input::get('start_date', "") != "")
        && (Input::get('end_date', "") != "")
        && (Input::get('business_name', "") != "")
        && (Input::get('business_address', "") != "")
        && (Input::get('zip_code', "") != "")
        //&& (Input::getString('img'))
        //&& (Input::has('img') != "")
        && (Input::get('category', "") != "")
    ) {
    echo "the POST supervariable has everything it needs! the user submitted everything just fine." . PHP_EOL;
        $submission = new Ad();
        $submission->discount_name = Input::get('discount_name');
        $submission->description = Input::get('description');
        $submission->percent_off = Input::get('percent_off');
        $submission->date_added = date('Y-m-d');
        $submission->start_date = Input::get('start_date');
        $submission->end_date = Input::get('end_date');
        $submission->business_name = Input::get('business_name');
        $submission->business_address = Input::get('business_address');
        $submission->zip_code = Input::get('zip_code');
        $submission->category = Input::get('category');
        $submission->img = $profilePic;
        //var_dump($submission);
        $submission->save();
        };
    //redirect to thank-you page displaying submission with optional link to EDIT page


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
        <title>Browse Hot Dealz!</title>
        <meta name="description" content="GrapeOn provides local classifieds for grape products and grape events with food, drink, and vines">
</head>
<body>
	<?php require_once '../views/partials/navbar.php'; ?>
	<?php require_once '../views/partials/header.php'; ?>
	<?php require_once '../views/partials/footer.php'; ?>
	
	<h2>
		Take advantage of <?= $grape['discount_name']?>
	</h2>
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
		<img src="/img/<?= $grape['img'] ?>"> 
	</p>
	<br>
		<a href="?ad_id=<?= $id - 1 ?>">Previous Discount</a>
	<br>
		<a href="?ad_id=<?= $id + 1 ?>">Next Discount</a>
	<br>
		<a href="">Back to Listings</a>
	<br>

</body>
</html>