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
	$id=$_POST['id'];
	
	$sql="UPDATE $tbl_name SET Judul='$Judul', Tanggal='$Tanggal', Konten='$Konten' WHERE IDBlogPost='$id'";
	$result=mysql_query($sql);
	if($result){
		echo "Successful";
		echo "<BR>";
	} else {
		echo "ERROR";
	}
	header("Location: ../index.php");
?>