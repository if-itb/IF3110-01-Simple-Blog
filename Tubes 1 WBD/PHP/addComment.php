<?php 
	/* Code to save newly added comment */
	$id = $_GET["id"];
	$x = $_GET["name"];
	$y = $_GET["email"];
	$z = $_GET["comment"];
	
	require_once('startConnection.php');
	
	//check connection
	if (mysqli_connect_errno()) {
		//failed to connect
		$url = "../VIEW/dbFail.html";
		header( "Location: $url" ); 
	}
	else {		
		$date = 2000+date("y")."-".date("m-d");
		$time = date("H:i:s");
		//echo $date;
		//echo $time;
		$newID = mysqli_query($con, "SELECT MAX(commentID) as 'id' FROM comment");
		$last = mysqli_fetch_array($newID, MYSQL_ASSOC);
		
		$var = mysqli_query($con, "INSERT INTO comment VALUES (".($last["id"]+1)." ,".$id.", '".$x."', '".$y."', '".$z."', '".$date."', '".$time."')");
		//var_dump($var);
		if ($var) {
			echo "ok";
		}
		mysqli_close($con);
	}
?>