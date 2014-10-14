<?php

	require_once __DIR__ . '/connect_db.php';	
	$db = new connect_db();
	$id = $_GET['id'];
	mysql_query("DELETE FROM simple_post WHERE pid=$id") or die(mysql_error());
	header("Location: index.php");
	
?>