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

$keyword = "all";

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
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
        $submission->img = 'placeholderGrape.png';
        var_dump($submission);
        $submission->save();
        };
    //redirect to thank-you page displaying submission with optional link to EDIT page

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
	<?php require_once '../views/partials/footer.php'; ?>
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
    <h2>Page <?= $page?>
    <a class="paginator" href="?page=<?= $page - 1?>&keyword=<?=$keyword ?>">&#8606</a>
    <a class="paginator" href="?page=<?= $page + 1?>&keyword=<?=$keyword ?>">&#8608</a>
    </h2>

</body>
