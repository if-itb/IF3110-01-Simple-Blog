<?php
	// Create connection
	$con=mysqli_connect("localhost","root","","simple_post");

	// Check connection
	if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$judul = mysqli_real_escape_string($con, $_POST['Judul']);
	$tanggal = mysqli_real_escape_string($con, $_POST['Tanggal']);
	$konten = mysqli_real_escape_string($con, $_POST['Konten']);
	
	//insert new data
	$sql = "INSERT INTO info_post (ID, judul, konten, tanggal)
			VALUES ('','$judul', '$konten', '$tanggal')";
	
	if (!mysqli_query($con,$sql)) 
	{
		die('Error: ' . mysqli_error($con));
	}
	
	mysqli_close($con);
	
	$url = "index.php";
	
	function redirect($url, $statusCode = 303)
	{
	   header('Location: ' . $url, true, $statusCode);
	   die();
	}
	
	redirect($url);
?>