<?php
	$id = $_GET["id"];
	$con = mysqli_connect("localhost", "root", "", "simpleblog");
	if (!mysqli_connect_errno()) {
		mysqli_query($con, "DELETE from post WHERE id=".$id);
		$url = 'index.php';
		mysqli_close($con);
		header( "Location: $url" ); 
	}
?>