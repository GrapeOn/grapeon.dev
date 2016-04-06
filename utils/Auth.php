<?php

class Auth {

	 // Auth::attempt($username, $password) 

	 public static function attempt($username, $password) {
	 	$user = User::findByUsername($username);
	 	if (is_null($user)) {
	 		return false;	
	 	}
	 	if (password_verify ($password, $user->password)){ 
	 		$_SESSION['LOGGED_IN_USER'] = $username;
			return true;
	 	}	
	 	return false;
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
		    // header('Location: /login.php');
		}
	}

?>