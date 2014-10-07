<?php
	if (!isset($connDb) || !mysqli_ping($connDb)) {
		$connDb = mysqli_connect("localhost", "root", "", "simple_blog");
		if (mysqli_connect_errno()) {
	  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}	
?>