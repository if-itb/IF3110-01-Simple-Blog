<?php 
	// Code to save newly added comment
	$id = $_GET["id"];
	$x = $_GET["name"];
	$y = $_GET["email"];
	$z = $_GET["comment"];
	
	//make connection
	$con = mysqli_connect("localhost", "root", "", "simpleblog");
	
	//check connection
	if (!mysqli_connect_errno()) {
		$date = 2000+date("y")."-".date("m-d");
		//$time = date("H:i:s");
		$newID = mysqli_query($con, "SELECT MAX(commentID) as 'id' FROM comment");
		$last = mysqli_fetch_array($newID, MYSQL_ASSOC);
		
		$var = mysqli_query($con, "INSERT INTO comment VALUES (".($last["id"]+1)." ,".$id.", ".$date.", '".$z."', '".$x."', '".$y."')");
		if ($var) {
			echo "ok";
		}
		mysqli_close($con);
	}
?>