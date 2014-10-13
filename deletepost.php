<?php
	include('connectdb.php');
	$pid = $_GET['pid'];
	$query = mysql_query("DELETE FROM post WHERE pid = '$pid'") or die(mysql_error());
	header('location:index.php');	
?>
