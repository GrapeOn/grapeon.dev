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

$keyword = Input::get('keyword');

// find the total number of classified ads
$category = Input::get('keyword');
if ($category) 
{
    $stmt_2 = $dbc->prepare("SELECT count(ad_id) AS count FROM ad_table WHERE category = :category");
    $stmt_2->bindValue(':category', $category, PDO::PARAM_STR);
} 
else
{
    $stmt_2 = $dbc->prepare("SELECT count(ad_id) AS count FROM ad_table");
}
    $stmt_2->execute();
    $total = $stmt_2->fetch(PDO::FETCH_ASSOC);

// divide the number of classified ads by the limit and round up for pagination 
$number_pages = ceil($total['count']/$limit);

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
<body
	<!--require page elements-->
	<?php require_once '../views/partials/navbar.php'; ?>
	<?php require_once '../views/partials/header.php'; ?>
    <h2>Category: <?=$keyword?></h2>
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
    <h4>Page <?= $page?>
        <?php if ($page > 1 ): ?>
            <a class="paginator" href="?page=<?= $page - 1?>&keyword=<?=$keyword ?>">&#8606</a>
        <?php endif; ?>
        <?php if ($page < $number_pages): ?>
            <a class="paginator" href="?page=<?= $page + 1?>&keyword=<?=$keyword ?>">&#8608</a>
        <?php endif; ?>
    </h4>
    <?php require_once '../views/partials/footer.php'; ?>
</body>
