<?php
	$jdl = $_POST['Judul'];
	$tgl = $_POST['Tanggal'];
	$kntn = $_POST['Konten'];
	
	$con = mysqli_connect("localhost","root","","if3110-tugas1");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	// echo "SEBELUM";
	// echo $_POST['PostId'];
	if (strlen($_POST['PostId']) > 0) {
		$id = $_POST['PostId'];
		$result = mysqli_query($con, "UPDATE post SET judul = \"".$jdl."\", tanggal_post = \"".$tgl."\", konten = \"".$kntn."\" WHERE id_post = ".$id."");
	} else {
		echo "INSERT";
		$result = mysqli_query($con, "INSERT INTO post(judul, tanggal_post, konten) VALUES ('".$jdl."','".$tgl."','".$kntn."')");
	}
	mysqli_close($con);
	header('Location: index.php');
	die();
?>