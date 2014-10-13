<?php
	include('connectdb.php');
	$pid = $_POST['pid'];
	$judul = $_POST['judul'];
	$tanggal = $_POST['tanggal'];
	$konten = $_POST['konten'];

	$query = mysql_query("UPDATE post SET judul = '$judul', tanggal = '$tanggal', konten = '$konten' WHERE pid = $pid ") or die (mysql_error());

	header('location:index.php');
?>