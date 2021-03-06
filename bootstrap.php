<?php
//bootstrap.php will contain ALL requires; then we will require bootstrap.php at the top of all relevant php files
if (session_status() != PHP_SESSION_ACTIVE) 
	{ 
		session_start();
	}
$_ENV = include '.env.php';
require_once 'database/db_connect.php';
require_once('utils/Input.php');
require_once('utils/Auth.php');
require_once('utils/Logger.php');
//models
require_once('models/BaseModel.php');
require_once('models/Ad.php');
require_once('models/User.php');
