<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$db_name = "db_simple_blog";
	
	$connection = mysql_connect($host, $username, $password) or die("Koneksi tidak berhasil !".mysql_error());
	mysql_select_db($db_name, $connection) or die("Database tidak ada !".mysql_error);
	
?>