<?php
	include '../template/dbconnect.php';
	echo $_GET['id'];
	$id = $_GET['id'];
	echo $id;
	$query = "DELETE FROM posting WHERE id = '$id'";
	if(!mysql_query($query)){
  		echo 'blablabla';
  	}
  	header('Location: /if3110-01-simple-blog/index.php');
?>