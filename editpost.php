<?php
	require("sqlconnect.php");
	$judul = $_POST['Judul'];
	$tanggal = $_POST['Tanggal'];
	$konten = $_POST['Konten'];
	$id = $_GET['id'];
	$editquery = "UPDATE postdata.post SET judul='$judul', tanggal='$tanggal', konten='$konten' WHERE id='$id'";
	mysql_query($editquery, $connection);
	header("location:index.php");
?>