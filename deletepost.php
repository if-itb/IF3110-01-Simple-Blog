<?php
	require("sqlconnect.php");
	$id = $_GET['id'];
	$deletequery = "DELETE FROM post WHERE id='$id'";
	mysql_query($deletequery, $connection);
	header("location:index.php");
?>