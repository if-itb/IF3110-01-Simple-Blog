<?php 
	/* Delete comment from database */
	$x = $_GET["id"];
	
	require_once('startConnection.php');
	
	//check connection
	if (mysqli_connect_errno()) {
		//failed to connect
		$url = "../VIEW/dbFail.html";
		header( "Location: $url" ); 
	}
	else {		
		$result = mysqli_query($con, "DELETE FROM comment where commentID=".$x);
		mysqli_close($con);
		echo "ok";
	}
?>