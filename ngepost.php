<?php
	header("Location: index.php");
	$con=mysqli_connect("localhost","root","","datapost");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " .mysql_conneect_error();
	}
	$Judul = mysql_real_escape_string($_POST['Judul']);
	$Tanggal = mysql_real_escape_string($_POST['Tanggal']);
	$Konten = mysql_real_escape_string($_POST['Konten']);
	str_replace("\n","<br>",$Konten);
	$sql = "INSERT INTO postingan (Judul, Tanggal, Konten)
	VALUES ('$Judul', '$Tanggal', '$Konten')";

	if (!mysqli_query($con,$sql)){
		die('Error: ' .mysqli_error($con));
	}
	mysqli_close($con);
?>
