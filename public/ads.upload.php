<?php
require_once '../bootstrap.php';
require_once '../utils/Uploader.php';

Uploader::uploadFunction();

//est. newestEntry

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
        $submission->submitted_by = $_SESSION['LOGGED_IN_USER'];
        //var_dump($submission);
        $submission->save();

        //redirect once submission has been saved

        $stmt2 = $dbc->prepare("SELECT COUNT(*) AS count FROM ad_table");
        $stmt2->execute();
        $count = $stmt2->fetch(PDO::FETCH_ASSOC);
        $newestEntry = $count['count'];

        $redirect = "Location: ads.show.php?ad_id=$newestEntry";

        header($redirect);

        exit();
    };
