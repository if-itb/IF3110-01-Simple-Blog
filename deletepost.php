<?php
	//Open connection to mysql
	$con=mysqli_connect("localhost","root","","simple_blog");
	//Error checking
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else{
		$id = mysqli_real_escape_string($con, $_GET['id']);
		$sql = mysqli_query($con,"DELETE FROM `simple_blog`.`post` WHERE `post`.`post_id` = $id");
		mysqli_close($con);
		header('Location: index.php');
	}

?>