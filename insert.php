<?php
	$jdl = $_POST['Judul'];
	$tgl = $_POST['Tanggal'];
	$kntn = $_POST['Konten'];
	
	$con = mysqli_connect("localhost","root","","if3110-tugas1");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($con, "INSERT INTO post(judul, tanggal_post, konten) VALUES ('".$jdl."','".$tgl."','".$kntn."')");
	mysqli_close($con);
	header('Location: index.php');
	die();
?>