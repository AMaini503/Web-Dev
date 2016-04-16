<?php
	session_start();
	$username = $_SESSION['login_user'];
	if(session_destroy()) {
		//Add timestamp corresponding to user's departure from session
		$fp = fopen("log.html", "a");
		fwrite($fp, "<div>User : <strong>" . $username ." </strong> has left the session.</div>");
		fclose($fp);

		//redirect to login page
		header("location: index.php");
	}
	unset($username);
?>