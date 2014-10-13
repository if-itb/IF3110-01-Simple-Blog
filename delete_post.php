<?php
	$postId = $_GET['id'];
	$con=mysqli_connect("localhost","root","","simple_blog");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	mysqli_query($con,"DELETE FROM post WHERE id='$postId'");
	mysqli_close($con);
	header('location:'."index.php");
    exit;
?>