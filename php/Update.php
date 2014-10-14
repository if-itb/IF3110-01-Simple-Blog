<?php
	$f = $_POST["Hidden"];
	$x = $_POST["Title"];
	$y = $_POST["Date"];
	$z = $_POST["Content"];

	//make connection
	$con = mysqli_connect("localhost", "root", "", "simpleblog");

	mysqli_query($con, "UPDATE post SET title='".$x."', date='".$y."', content='".$z."' WHERE id=".$f);
	$url = '../VIEW/Home.php';
	mysqli_close($con);
	header( "Location: $url" ); 
?>