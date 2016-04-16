<?php
	session_start();
	if(isset($_SESSION['login_user'])) {
		$text = $_POST['text'];
		$fp = fopen("log.html", "a");
		fwrite($fp, 
			"<div>(" . date("g:i A") . ") <stong>" . $_SESSION['login_user'] . "</strong> : " . stripslashes(htmlspecialchars($text)) . "</div>"
			);
		fclose($fp);
	}
?>