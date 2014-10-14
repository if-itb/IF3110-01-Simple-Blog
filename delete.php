<?php
	include('connect.php');

	$ID = $_GET['ID'];
	$query = mysql_query("
		DELETE FROM post 
		WHERE ID = '$ID'
	") or die(mysql_error());
	if ($query) {
		header('location:index.php');
	}
?>