<?php
	include ("connect.php");
	$id=$_GET['id'];
	$sql="DELETE FROM post WHERE id=".$id;
	mysql_query($sql);
	//header("Location: index.php");
?>