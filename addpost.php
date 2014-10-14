<?php
	require("sqlconnect.php");
	$judul = $_POST['Judul'];
	$tanggal = $_POST['Tanggal'];
	$konten = $_POST['Konten'];
	$addquery = "INSERT INTO postdata.post VALUES ('NULL','$judul','$tanggal','$konten')";
	mysql_query($addquery, $connection);
	header("location:index.php");
?>