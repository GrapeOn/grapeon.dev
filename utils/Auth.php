<?php

class Auth {
	 public static $password = 'grape';
	 public static $username = 'grape';

	 // Auth::attempt($username, $password) 

	 public static function attempt($username, $password) {
	 	
	 	if (password_verify ($password, self::$password) && self::$username == $username){ 
	 		$_SESSION['LOGGED_IN_USER'] = $username;
			return true;
	 	}	return false;
	  }

	 public static function check() {
	 	if (isset($_SESSION['LOGGED_IN_USER']) && $_SESSION['LOGGED_IN_USER'] != '') {
	 		return true;
		} else {
			return false;
		}
	 } 


	 //will return the username of the currently logged in user.
	 public function user()
	 	{
	 		return isset($_SESSION['LOGGED_IN_USER'])? $_SESSION['LOGGED_IN_USER'] : null;
	 	}
		
	 public function logout()
		{
		    // clear $_SESSION array
		    session_unset();

		    // delete session data on the server and send the client a new cookie
		    session_regenerate_id(true);
		    header('Location: /login.php');
		}
	}

?>