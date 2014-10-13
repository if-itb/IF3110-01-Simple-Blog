<?php

require 'database.php';

$pid = 0;
if (!empty($_GET['pid'])){
	$pid = $_REQUEST['pid'];
}

	
	$sambung = mysql_connect("localhost:3306","root","");
	if (!$sambung) {
		die('Tidak bisa tersambung: ' . mysql_error());
	}
	mysql_select_db("simpleblog");
	$deletePost = "DELETE FROM blogitem WHERE pid='$pid' ";
	if (!mysql_query($deletePost,$sambung)){
		die('Error: ' . mysql_error());
	}

	mysql_close($sambung);
	header("Location: index.php");
		



?>