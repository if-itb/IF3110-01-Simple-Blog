<?php
	$jdl = $_POST['Judul'];
	$tgl = $_POST['Tanggal'];
	$kntn = $_POST['Konten'];
	$id = $_POST['PostId'];
	
	$con = mysqli_connect("localhost","root","","if3110-tugas1");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($con, "UPDATE post SET judul = \"".$jdl."\", tanggal_post = \"".$tgl."\", konten = \"".$kntn."\" WHERE id_post = ".$id."");
	mysqli_close($con);
	header('Location: index.php');
	die();
?>