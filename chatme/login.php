<?php
session_start();

//check if form was submitted
if(isset($_POST['submit'])) {

	//check if username or password is not empty
	if(empty($_POST['username']) || empty($_POST['password'])) {
		$_SESSION['error'] = "Username or Password is invalid!";
	}
	else {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		//opening a connection to the mysql server
		$conn = new mysqli("localhost", "root", "password", "chatme");


		//String sql query to get the user
		$sql_query = "SELECT * FROM users where username='" . $username . "' AND password='" . $password . "';";
		$url = "";
		$result = $conn->query($sql_query);
		$_SESSION['sql_query'] = $sql_query;
		if($result->num_rows == 0) {
			$_SESSION['error'] = "Username or Password is Invalid!";
			$url = "index.php";
		}
		else {
			$row = $result->fetch_assoc();
			$_SESSION['login_user'] = $row["username"];
			$url = "profile.php";
		}
		//close the connection finally 
		$conn->close();
		// header("location: " . $url);
	}
}
