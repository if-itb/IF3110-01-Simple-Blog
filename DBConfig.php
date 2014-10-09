<?php
	$link = mysql_connect("localhost","tolep","tolepop")
	or die("Could not connect to the server.");

	mysql_select_db("simpleblog",$link)
	or die("Could not select the database.");

?>

