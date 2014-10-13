<?php
	include("DBConfig.php");
	
	$id = $_GET['id'];

	$result=mysql_query("DELETE FROM komentar where PID=$id");
	$result=mysql_query("DELETE FROM entries where PID=$id");

	header('Location:index.php');
?>