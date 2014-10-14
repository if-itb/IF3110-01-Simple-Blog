<?php

	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname = "simpleblog";
	
	// Create connection
	$con= mysqli_connect($host,$username,$password,$dbname);

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>