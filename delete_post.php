<?php
header("Location: index.php");
$con=mysqli_connect("localhost","root","","datapost");
// Check connection
	$ID = $_GET['id'];
	echo $ID;
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($con,"DELETE FROM postingan WHERE IDpost = $ID");
	mysqli_close($con);
?>
