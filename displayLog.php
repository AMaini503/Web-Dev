<?php
	$fp = fopen("log.html", "r");
	$contents = fread($fp, filesize("log.html"));
	echo $contents;
	fclose($fp);
?>