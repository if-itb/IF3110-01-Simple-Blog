<?php
	$con=mysqli_connect("localhost","root","","blog_posts");
	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	// escape variables for security
	$comment_name = $_POST['Nama'];
	$comment_email = $_POST['Email'];
	$comment_content = $_POST['Komentar'];
	$comment_date = $_POST['tanggal'];
	$comment_post_id = $_POST['id'];


	$sql="INSERT INTO comment (comment_post_id, comment_name, comment_email, comment_content, comment_date)
	VALUES ('$comment_post_id','$comment_name', '$comment_email', '$comment_content', '$comment_date')";

	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
?>