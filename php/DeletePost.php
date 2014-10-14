<?php
	$id = $_GET["Id"];
	$con = mysqli_connect("localhost", "root", "", "simpleblog");
	if (!mysqli_connect_errno()) {
		mysqli_query($con, "DELETE from post WHERE id=".$id);
		$url = '../VIEW/Home.php';
		mysqli_close($con);
		header( "Location: $url" ); 
	}
?>