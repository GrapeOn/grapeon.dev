<?php
	require '../bootstrap.php';
	
    // redirect to index.php

    if (isset($_SESSION['LOGGED_IN_USER'])) {
        Auth::logout();
        header("Location: http://grapeon.dev/index.php");
    exit();
}
?>
