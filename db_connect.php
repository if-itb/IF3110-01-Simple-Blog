<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$dbname = "simplebLog";

	mysql_connect($host,$user,$password) or die("Could not connect to database");
	mysql_select_db($dbname);
	
?>