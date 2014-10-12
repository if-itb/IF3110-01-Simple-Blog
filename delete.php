<?php
	$postId = $_GET['postId'];
	echo $postId;
	$con = mysqli_connect("localhost","root","","if3110-tugas1");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($con, "DELETE FROM post WHERE id_post =".$postId);
	mysqli_close($con);
	header('Location: index.php');
	die();
?>