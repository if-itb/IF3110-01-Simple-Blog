<?php 
	include 'database.php';
	$pdo=Database::connect();
	$query="SELECT * FROM post";
	$data=$pdo -> query($query);
	Database::disconnect();
?>