<?php
	$con=mysqli_connect("127.0.0.1","root","","simpleblog");
	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$judul = $_POST['Judul'];
	$tanggal = $_POST['Tanggal'];
	$konten = $_POST['Konten'];
	
	$sql = "INSERT INTO post (JUDUL, TANGGAL, KONTEN, FEATURED)
			VALUES ('$judul', '$tanggal', '$konten','0')";

	if (!mysqli_query($con,$sql)) {
  		die('Error: ' . mysqli_error($con));
	}
	
	mysqli_close($con);

	header("Location: index.php");
?>