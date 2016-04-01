

<?php
require '../bootstrap.php';
//hard-coded array of ads?
$ads_test_arrays = [
	[
		'discount_name' => 'Half Off All Grapes at Grape Parade!',
		'description' => 'Swing by Grape Parade and sink your teeth into this truly purple deal! 50% off all grapes! (DISCLAIMER: DOES NOT INCLUDE GREEN GRAPES)',
		'percent_off' => '50',
		'start_date' => '2016-02-15',
		'end_date' => '2016-04-01',
		'date_added' => '2015-03-31',
		'business_name' => 'Grape Parade',
		'business_address' => '69 Purple Pit Place',
		'zip_code' => '11221',
		'img' => 'grape_parade.png'
	]
]

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
        <title>Browse Hot Dealz!</title>
        <meta name="description" content="GrapeOn provides local classifieds for grape products and grape events with food, drink, and vines">
    </head>
<body>
	<!--require page elements-->
	<?php require_once '../views/partials/navbar.php'; ?>
	<?php require_once '../views/partials/header.php'; ?>
	<?php require_once '../views/partials/footer.php'; ?>

        <tbody>
            <?php foreach ($ads_test_arrays as $ads_test_array) :?>
                <tr>
                    <td><?= $ads_test_array['discount_name']?></td>
                    <br>
                    <td><?= $ads_test_array['description'] ?></td>
                    <br>
                    <td><?= $ads_test_array['percent_off'] ?></td>
                    <br>
                    <td><?= $ads_test_array['start_date'] ?></td>
                    <br>
                    <td><?= $ads_test_array['end_date'] ?></td>
                    <br>
                    <td><?= $ads_test_array['date_added'] ?></td>
                    <br>
                    <td><?= $ads_test_array['business_name'] ?></td>
                    <br>
                    <td><?= $ads_test_array['business_address'] ?></td>
                    <br>
                    <td><?= $ads_test_array['zip_code'] ?></td>
                    <br>
                    <td><?= $ads_test_array['img'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>

</body>
