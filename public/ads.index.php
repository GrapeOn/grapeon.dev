<?php
require '../bootstrap.php';

$stmt = $dbc->prepare("SELECT * FROM ad_table");
$stmt->execute();
$ads_array = $stmt->fetchAll(PDO::FETCH_ASSOC);

$limit = 3;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page < 1) {
        $page = 1;
    }
} else {
    $page = 1;
}
$offset = ($page - 1) * 4;

// find the total number of classified ads
$stmt_2 = $dbc->prepare("SELECT count(ad_id) AS count FROM ad_table");
$stmt_2->execute();
$total = $stmt_2->fetch(PDO::FETCH_ASSOC);

// divide the number of classified ads by the limit and round up for pagination 
$number_pages = ceil($total['count']/$limit);

// limit the page number
if ($page > $number_pages) {
    $page = $number_pages;
}

$keyword = "all";

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}

if ($keyword != "all") {
    $stmt = $dbc->prepare("SELECT * FROM ad_table WHERE category = :keyword LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':keyword', $keyword, PDO::PARAM_STR);
} else {
    $stmt = $dbc->prepare("SELECT * FROM ad_table LIMIT :limit OFFSET :offset");
}
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$limited_ads_array = $stmt->fetchAll(PDO::FETCH_ASSOC);

//the following overrides $limited_ads_array to foreach through all submissions from a given user
if (isset($_GET['submitted_by'])) {
    $submitted_by = $_GET['submitted_by'];
    $stmt = $dbc->prepare("SELECT * FROM ad_table WHERE submitted_by = :submitted_by");
    $stmt->bindValue(':submitted_by', $submitted_by, PDO::PARAM_STR);
    $stmt->execute();
    $limited_ads_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <link rel="stylesheet" href="/css/main.css">
        <title>Browse Hot Dealz!</title>
        <meta name="description" content="GrapeOn provides local classifieds for grape products and grape events with food, drink, and vines">
    </head>
<body>
	<!--require page elements-->
	<?php require_once '../views/partials/navbar.php'; ?>
	<?php require_once '../views/partials/header.php'; ?>
    <div class="container">
            <tbody>
                <?php foreach ($limited_ads_array as $key => $ad) :?>
                    <tr>
                        <td>
                            <h2>
                                <a href="ads.show.php?ad_id=<?= $ad['ad_id']?>"
                                >
                                    <?= $ad['discount_name']?>
                                </a>
                            </h2>
                        </td>
                        <td>
                            <h3>
                                @ <?= $ad['business_name'] ?>
                            </h3>
                            <br>
                        </td>
                        <td>
                            <img class="adsIndexPhotos ad_image" src="/img/<?= $ad['img'] ?>">
                            <br>
                            <br>
                        </td>
                    </tr>
                    <hr>
                <?php endforeach ?>
            </tbody>
    <h3>Category: <?=$keyword?></h2>
    <!--this kills the script before the pagination arrows can run IF we are viewing user submissions-->
        <?php if (isset($_GET['submitted_by'])) { ?>
            </body>
            </html>  
            <?php die(); ?>
        <?php } ?>

        <h4>Page <?= $page?></h4>
            <?php if ($page > 1 ): ?>
                <h3><a class="paginator" href="?page=<?= $page - 1?>&keyword=<?=$keyword ?>">&#8606</a>
            <?php endif; ?>
            <?php if ($page < $number_pages): ?>
                <a class="paginator" href="?page=<?= $page + 1?>&keyword=<?=$keyword ?>">&#8608</a>
            <?php endif; ?></h3>
    </div>
    <?php require_once '../views/partials/footer.php'; ?>


</body>
</html>
