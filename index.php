<?php 
	include("login.php");
	if(isset($_SESSION['login_user'])) {

		//user's session exists, then redirect the user to his profile page
		header("location: profile.php");
	}
?>

<html>
	<head>
		<meta charset="utf-8" />
		<link type="text/css" rel="stylesheet" href="styles/styles.css" />
	</head>
	<body>
		<div id="wrapper">
			<form action="" method="post">
				<table>
					<tr>
						<td>
							<label for="username">Username : </label>
							<input type="text" name="username" id="username"  placeholder="username"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="password">Password : </label>
							<input type="password" name="password" id="password" placeholder="**********"/>
						</td>
					</tr>
					<tr>
						<td>
							<input name="submit" type="submit" value="Login"/>
						</td>
					</tr>
				</table>
				<span>
					<?php 
					if(isset($_SESSION['error'])) {
						echo $_SESSION['error']; 
						unset($_SESSION['error']);	
					}
					?>
			</span>
			</form>
		</div>
	</body>
</html>