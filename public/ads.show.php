<?php

define('DB_NAME', 'grapes_db');
define('DB_USER', 'grapes_user');
define('DB_PASSWORD', 'grapes_user');
define('DB_HOST', '127.0.0.1');

require_once '../bootstrap.php';
// require_once('db_connect.php');

if (isset($_GET['ad_id'])) {
	
	$id = $_GET['ad_id'];
	
	$stmt = $connection->query("SELECT * FROM ad_table WHERE ad_id = $id");

	$grape = $stmt->fetch(PDO::FETCH_ASSOC);

}

?>

<DOCTYPE! HTML>
<html>
<head>
	<title></title>
	<!-- <link rel="stylesheet" type="text/css" href="/grapes_stylesheet.css"> -->
</head>
<body>
	<h2>
		Take advantage of <?= $grape['discount_name']?>
	</h2>
	<h3>
		This discount is <?= $grape['percent_off']?> % off! 
	</h3>

	<h3 id="description">
		<?= $grape['description'] ?>
	</h3>
	<a href="?ad_id=<?= $id - 1 ?>">Previous Discount</a>
	<a href="?ad_id=<?= $id + 1 ?>">Next Discount</a>
	<br>
	<br>
	<a href="">Back to Listings</a>

</body>
</html>
?>