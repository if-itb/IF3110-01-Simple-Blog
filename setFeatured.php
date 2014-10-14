<?php
	$con=mysqli_connect("127.0.0.1","root","","simpleblog");
	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$id = $_GET['id'];
	$fea = $_GET['fea'];
	$sql = "";

	if($fea==1)
	{
		$sql = "UPDATE post SET FEATURED='0'
				WHERE ID=$id";
	}
	else
	{
		$sql = "UPDATE post SET FEATURED='1'
				WHERE ID=$id";
	}

	if (!mysqli_query($con,$sql)) {
  		die('Error: ' . mysqli_error($con));
	}
	
	mysqli_close($con);
	header("Location: index.php");
?>