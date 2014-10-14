<!-- Ananda Kurniawan /13511052--> 
<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$dbname = "simple_bLog";

	mysql_connect($host,$user,$password) or die("Could not connect to database");
	mysql_select_db($dbname);
	
?>