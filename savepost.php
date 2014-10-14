<?php

include "db-connector.php";


$judul = $_POST['Judul'];
$tanggal = $_POST['Tanggal'];
$konten = $_POST['Konten'];


$query_insert = "INSERT INTO post_content 
				(title,date,content) 
				VALUES ('$judul','$tanggal','$konten')";

mysql_select_db("db_simpleblog");
$retval = mysql_query($query_insert,$db);
if (! $retval){
	die("Could not enter data : " . mysql_error());
}else {
	header("location:index.php");
}

?>