<?php 
	/* Delete post from database */
	$x = $_GET["hidden"];
	
	require_once('startConnection.php');
	
	//check connection
	if (mysqli_connect_errno()) {
		//failed to connect
		$url = "../VIEW/dbFail.html";
		header( "Location: $url" ); 
	}
	else {		
		$result = mysqli_query($con, "DELETE FROM post where id=".$x);
		mysqli_close($con);
		echo "ok";
	}
?>