<?php

// starts a session or finds a session
// allows us to use a $_SESSION superglobal

require '../bootstrap.php';

function pageController()

	{
	session_start();	
		$username = Input::has('username') ? Input::get('username') : '';
		$password = Input::has('password') ? Input::get('password'): '';

		$result = Auth::attempt($username, $password);

		if($result) {
			header('Location: authorized.php');
			die();
		} else if ($username != '' && $password != '') {
	echo ("Password was incorrect");
	}
	 return array (
		'username' => $username,
		'password' => $password,
		'result' => $result
		);
}
extract(pageController());
?>


<!DOCTYPE html>
<html>
<head>
    <title>Log in page</title>
</head>
<body>
    <form method="POST">
        <label>User Name</label>
        <input type="text" name="username" value="<?= Input::escape($username)?>"><br>
        <label>Password</label>
        <input type="text" name="password" value="<?= Input::escape($password)?>"><br>
        <input type="submit">
    </form>
</body>
</html>