<?php 
	$mysql_hostname = "localhost";
	$mysql_user = "root";
	$mysql_password = "";
	$mysql_database = "db_simpleblog";
	$prefix = "";
	$db = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops something went wrong");
	mysql_select_db($mysql_database, $db) or die("Something wrong.");
?>
