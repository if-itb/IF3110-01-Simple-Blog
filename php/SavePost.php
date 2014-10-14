<?php
	$title = $_POST["Title"];
	$date = $_POST["Date"];
	$content = $_POST["Content"];

	//make connection
	$con = mysqli_connect("localhost", "root", "", "simpleblog");

	if (!mysqli_connect_errno()) {
		$var = mysqli_query($con, "SELECT MAX(id) as 'id' FROM post");
		$last = mysqli_fetch_array($var, MYSQL_ASSOC);
		$result = mysqli_query($con, "INSERT INTO post VALUES ( ".($last["id"]+1).", '".$title."', '".$date."', '".$content."')");
		$url = '../VIEW/Home.php';
		mysqli_close($con);
		header( "Location: $url" ); 
	}
?>