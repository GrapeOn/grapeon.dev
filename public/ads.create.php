<?php
?>
<?php
    require '../bootstrap.php';
   //conditional statement binding user input to :variables, then INSERTING them INTO ad_table
   if (
   		(Input::has('discount_nameSubmission'))
   		&& (Input::getString('discount_nameSubmission') != "")
   		&& (Input::has('descriptionSubmission'))
   		&& (Input::getNumber('descriptionSubmission') != "")
   		&& (Input::getString('percent_offSubmission'))
   		&& (Input::has('percent_offSubmission') != "")
   		&& (Input::getDate('start_dateSubmission'))
   		&& (Input::has('start_dateSubmission') != "")
   		&& (Input::getString('end_dateSubmission'))
   		&& (Input::has('end_dateSubmission') != "")
   		&& (Input::getString('business_nameSubmission'))
   		&& (Input::has('business_nameSubmission') != "")
   		&& (Input::getString('business_addressSubmission'))
   		&& (Input::has('business_addressSubmission') != "")
   		&& (Input::getString('zip_codeSubmission'))
   		&& (Input::has('zip_codeSubmission') != "")
   		&& (Input::getString('imgSubmission'))
   		&& (Input::has('imgSubmission') != "")
	) {
   	//NOTE: once Ad class is finished, use the Ad class's methods to INSERT user submissions into ad_table!
   	//make sure to include YYYY-MM-DD timestamp!
   	//redirect to thank-you page displaying submission with optional link to EDIT page
   };
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

<form method="POST" action="national_parks.php">
	<label for="discount_nameSubmission">Discount name</label>
	<input type="text" name="discount_nameSubmission" id="discount_nameSubmission">
	<br><br>
	<label for="descriptionSubmission">A quick description!</label>
	<input type="text" name="descriptionSubmission" id="descriptionSubmission">
	<br><br>
	<label for="percent_offSubmission">Percent off</label>
	<input type="text" name="percent_offSubmission" id="percent_offSubmission">
	<br><br>
	<label for="start_dateSubmission">Start date (YYYY-MM-DD)</label>
	<input type="text" name="start_dateSubmission" id="start_dateSubmission">
	<br><br>
	<label for="end_dateSubmission">End date</label>
	<input type="text" name="end_dateSubmission" id="end_dateSubmission">
	<br><br>
	<!--NOTE: date_added will be added to the user submission through a PHP timestamp YYYY-MM-DD -->
	<label for="business_nameSubmission">Business or location name</label>
	<input type="text" name="business_nameSubmission" id="business_nameSubmission">
	<br><br>
	<label for="business_addressSubmission">Street address</label>
	<input type="text" name="business_addressSubmission" id="business_addressSubmission">
	<br><br>
	<label for="zip_codeSubmission">Zip code</label>
	<input type="text" name="zip_codeSubmission" id="zip_codeSubmission">
	<br><br>
	<h1>IMAGE UPLOADER GOES HERE!</h1>
	<button type="submit">Grape Job!</button>
</form>

</body>
</html>