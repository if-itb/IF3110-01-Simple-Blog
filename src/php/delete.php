<?php
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password=""; // Mysql password 
	$db_name="CRUD"; // Database name 
	$tbl_name="blogpost"; // Table name 

	// Connect to server and select database.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");
	$id=$_GET['id'];
	$sql = "DELETE FROM blogpost WHERE IDBlogPost = $id";
	$result=mysql_query($sql);
	$rows=mysql_fetch_array($result);
	header("Location: ../index.php");
?>