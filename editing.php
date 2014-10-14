<?php
	require ("sqlconnect.php");
	$judul = mysqli_real_escape_string($con, $_POST['Judul']);
	$tanggal = mysqli_real_escape_string($con, $_POST['Tanggal']);
	$konten = mysqli_real_escape_string($con, $_POST['Konten']);
	$postedit = "UPDATE listpost SET Judul='$judul', Tanggal = '$tanggal', Konten = '$konten' WHERE ID =".$_GET['POSTID'];
	if (!mysqli_query($con,$postedit)) {
		die ('Error: '. mysqli_error($con));
	}
	mysqli_close($con);
	header("Location: index.php"); 
	die();
?>
	