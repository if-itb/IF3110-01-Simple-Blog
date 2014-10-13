<?php
	$con= mysqli_connect("localhost","root","","list_post");
	if (mysqli_connect_errno()) {
 	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else {
		$id=$_GET['id'];
		$name = $_GET['Nama'];
		$date = 2000+date("y")."-".date("m-d");
		$email = $_GET['Email'];
		$content = $_GET['Konten'];
		mysqli_query($con,"INSERT INTO komentar (id_post, Nama, Tanggal, Konten, EMail) VALUES ('$id','$name','$date','$content','$email')");
	}	
	mysqli_close($con);
?>