<?php 
	/* Delete comment from database */
	$x = $_GET["id"];
	
	$con = mysqli_connect("localhost", "root", "", "simpleblog");
	
	
		$result = mysqli_query($con, "DELETE FROM comment where id=".$x);
		mysqli_close($con);
		echo "ok";
?>