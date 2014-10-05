<?php
	session_start();
	$link=mysqli_connect("localhost","root","","my_db");
	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$result = mysqli_query($link,"SELECT * FROM Posting");

	//get data and set it into multidimensional array
	while($row[] = mysqli_fetch_array($result));

	$_SESSION['data'] = $row;
	mysqli_close($link);
	header("Location:index.php");
	exit;
?>