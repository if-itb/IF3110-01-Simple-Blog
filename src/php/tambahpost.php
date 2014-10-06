<?php
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password=""; // Mysql password 
	$db_name="CRUD"; // Database name 
	$tbl_name="blogpost"; // Table name 

	// Connect to server and select database.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");
	
	$Judul=$_POST['Judul'];
	$Tanggal=$_POST['Tanggal'];
	$Konten=$_POST['Konten'];
	$sql = "INSERT INTO blogpost (Judul, Tanggal, Konten) values('$Judul', '$Tanggal', '$Konten')";
	$result=mysql_query($sql);
	$rows=mysql_fetch_array($result);
	echo "post telah ditambahkan. redirecting...";
	header("Location: ../index.php");
?>