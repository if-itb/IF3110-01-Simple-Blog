<?php
	header('Location: index.php');
	$con=mysqli_connect("localhost","root","","blog_posts");
	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$post_title = $_POST['Judul'];
	$post_date = $_POST['Tanggal'];
	$post_content = $_POST['Konten'];
	$sql="INSERT INTO post (post_title, post_date, post_content)
	VALUES ('$post_title', '$post_date', '$post_content')";

	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
?>