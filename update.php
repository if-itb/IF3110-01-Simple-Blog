<?php
	// update database
$iPost = $_GET['iPost'];
$judul = $_POST['Judul'];
$tanggal = $_POST['Tanggal'];
$konten = $_POST['Konten'];

include "db-connector.php";

$query_update = "UPDATE post_content 
				 SET title='$judul' , date='$tanggal', content='$konten'
				 WHERE id='$iPost' ";

$retval = mysql_query($query_update,$db);
if(! $retval){
	die("Could not update data : " . mysql_error());
}else {
	header("location:index.php");
}

?>