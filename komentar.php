<?php
	$db_link = mysqli_connect("localhost", "root", "", "my_db");

	$id = $_GET['var'];
	$nama = mysqli_real_escape_string($db_link,$_POST["Nama"]);
	$komentar = mysqli_real_escape_string($db_link,$_POST["Komentar"]);
	//$tanggal = mysqli_real_escape_string($db_link,$_POST["tanggal"]);

	$sqlinsert="INSERT INTO komentar(id, nama, komentar, tanggal) VALUES('$id','$nama','$komentar','2014-10-08')";
	if (!mysqli_query($db_link,$sqlinsert)) {
		die('Error: ' . mysqli_error($db_link));
	}

	mysqli_close($db_link);
	header("Location:post.php?var=$id");
	exit;
?>