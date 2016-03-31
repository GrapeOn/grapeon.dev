

<?php
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
        <title>Ads Index</title>
    </head>
<body>
        <thead>
            <tr>
                <td>Name</td>
                <td>Location</td>
                <td>Date Established</td>
                <td>Area in Acres</td>
                <td>Description</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ads_test_arrays as $ads_test_array) :?>
                <tr>
                    <td><?= $ads_test_array['discount_name'] ?></td>
                    <td><?= $ads_test_array['description'] ?></td>
                    <td><?= $ads_test_array['percent_off'] ?></td>
                    <td><?= $ads_test_array['start_date'] ?></td>
                    <td><?= $ads_test_array['end_date'] ?></td>
                    <td><?= $ads_test_array['date_added'] ?></td>
                    <td><?= $ads_test_array['business_name'] ?></td>
                    <td><?= $ads_test_array['business_address'] ?></td>
                    <td><?= $ads_test_array['zip_code'] ?></td>
                    <td><?= $ads_test_array['img'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>

</body>