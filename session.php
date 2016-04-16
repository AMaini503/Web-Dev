<?php
	session_start();
	if(!isset($_SESSION['login_user'])) {
		$_SESSION['error'] = "You need to login first!";
		//if user hasn't logged in, redirect to the index page with login form
		header("location: index.php");
	}
?>