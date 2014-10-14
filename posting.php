<?php
	require ("sqlconnect.php");
	$judul = mysqli_real_escape_string($con, $_POST['Judul']);
	$tanggal = mysqli_real_escape_string($con, $_POST['Tanggal']);
	$konten = mysqli_real_escape_string($con, $_POST['Konten']);
	//require("sqlconnect.php");
	$postinsert = "INSERT INTO listpost (Judul, Tanggal, Konten) VALUES ('$judul','$tanggal','$konten')";
	if (!mysqli_query($con,$postinsert)) {
		die ('Error: '. mysqli_error($con));
	}
	mysqli_close($con);
	header("Location: index.php"); 
	die();
?>
	