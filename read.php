<?php 
	include 'database.php';
	$pdo = Database::connect();
	$sql = "SELECT * FROM post order by id desc";
	$data = $pdo->query($sql);
	Database::disconnect();
 ?>
