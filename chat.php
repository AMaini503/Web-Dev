<?php 
	include("session.php");
?>
<html>
	<head>
		<meta charset="utf-8" />
		<link type="text/css" rel="stylesheet" href="styles/styles.css" />
	</head>
	<body>
		<div class="col-40" id="wrapper">
			<div id="top">
				<div class="col-70">
					<p>Welcome, <strong><?php echo $_SESSION['login_user']?></strong></p>
				</div>
				<div class="col-30 align-right">
					<a class="btn" href="profile.php">Exit Chat</a>
				</div>
			</div>
			<hr>
			<div id="chat-history">
				<?php 
					if(file_exists("log.html") && filesize("log.html") > 0) {
						$fp = fopen("log.html", "r");
						$contents = fread($fp, filesize("log.html"));
						fclose($fp);
						echo $contents;
					}
				?>
			</div>
			<hr>
			<div id="foot">
				<form action="" method="post">
					<input type="text" placeholder="Say hi to the other users!" name="message" id="message"/>
					<div class="col-30 align-right" >
						<input id="btn_submit" name="submit" type="submit" value="Send" />
					</div>
				</form>
			</div>
		</div>
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				function loadLog() {
					$.ajax({
							url: "displayLog.php",
							//file shouldn't be cached so that updated file is fetched each time
							cache: false,
							success: function(chat_history) {
								$("#chat-history").html(chat_history);

								//change the scroll
								$("#chat-history").animate({scrollTop : $("#chat-history").prop("scrollHeight")}, 500);
							}
						});
				}	
				setInterval(loadLog, 2500);

				//handler to handle user sending a msessage
				$("#btn_submit").click(function(){
					var client_msg = $("#message").val();
					$.post({
						url: "post.php", 
						data: {text: client_msg}
					});
					$("#message").val("");
					return false;
				});	
				
			});	
			
		</script>	
	</body>
</html>