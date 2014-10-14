<?php
	$con=mysqli_connect("127.0.0.1","root","","simpleblog");
	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$nama = $_POST['Nama'];
	$email = $_POST['Email'];
	$komentar = $_POST['Komentar'];
	$idpost = $_POST['ID'];
	
	$sql = "INSERT INTO komentar (ID, NAMA, EMAIL, KONTEN)
			VALUES ('$idpost', '$nama', '$email', '$komentar')";

	if (!mysqli_query($con,$sql)) {
  		die('Error: ' . mysqli_error($con));
	}
	
	mysqli_close($con);
?>