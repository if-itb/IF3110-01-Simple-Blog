<?php
	$server="localhost";
	$username="root";
	$password="";
	$database="simpleblogdb";
	mysql_connect($server,$username,$password) or die("gagal");
	mysql_select_db($database) or die("Database tidak ditemukan");
?>
 
