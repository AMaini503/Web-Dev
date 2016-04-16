<?php
include("session.php");
?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Your Home Page</title>
		<link type="text/css" rel="stylesheet" href="styles/styles.css" />
	</head>
	<body>
		<div id="profile">
			<p>Query Result : <?php echo $_SESSION['login_user']; ?></p>
			<p>Welcome <strong><?php echo $_SESSION['login_user']; ?></strong></p>
			<a class="btn" id="btn_start_chat" href="chat.php">Start Chat</a>
			<a class="btn" href="logout.php">Logout</a>
		</div>
	</body>
</html>