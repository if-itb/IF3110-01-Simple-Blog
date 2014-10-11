<?php
	$con= mysqli_connect("localhost","root","","list_post");
	if (mysqli_connect_errno()) {
 	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$title = mysqli_real_escape_string($con,$_POST['Judul']);
	$date = mysqli_real_escape_string($con,$_POST['Tanggal']);
	$content = mysqli_real_escape_string($con,$_POST['Konten']);
	mysqli_query($con,"UPDATE listpost SET Judul ='$title' WHERE id='".$_GET["id"]."'");
	mysqli_query($con,"UPDATE listpost SET Tanggal ='$date' WHERE id='".$_GET["id"]."'");
	mysqli_query($con,"UPDATE listpost SET Konten ='$content' WHERE id='".$_GET["id"]."'");

	mysqli_close($con);

	header('Location:index.php');
?>