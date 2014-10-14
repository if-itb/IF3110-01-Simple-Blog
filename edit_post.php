<?php
	header("Location: index.php");
	$con=mysqli_connect("localhost","root","","datapost");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " .mysql_conneect_error();
	}
	$IDpst = $_GET['id'];
	$Judul = mysql_real_escape_string($_POST['Judul']);
	$Tanggal = mysql_real_escape_string($_POST['Tanggal']);
	$Konten = mysql_real_escape_string($_POST['Konten']);

	$sql = "UPDATE postingan
			SET Judul='$Judul', Tanggal = '$Tanggal', Konten = '$Konten'
			WHERE IDpost = '$IDpst' ";

	if (!mysqli_query($con,$sql)){
		die('Error: ' .mysqli_error($con));
	}
	mysqli_close($con);
?>
