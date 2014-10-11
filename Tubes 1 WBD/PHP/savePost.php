<?php 
	/* Code to save newly added or updated post */
	$x = $_POST["postTitle"];
	$y = $_POST["postDate"];
	$z = $_POST["postContent"];
	$f = $_POST["hidden"];
	
	require_once('startConnection.php');
	
	//check connection
	if (mysqli_connect_errno()) {
		//failed to connect
		$url = "../VIEW/dbFail.html";
		header( "Location: $url" ); 
	}
	else {		
		$result = mysqli_query($con, "SELECT * FROM post where title=".$x);
		if (!$result) { //post with the same title not exist
			if ($f!=0) { //update db
				mysqli_query($con, "UPDATE post SET title='".$x."', content='".$z."' WHERE id=".$f);
			}
			else { //insert to db
				$var = mysqli_query($con, "SELECT MAX(id) as 'id' FROM post");
				$last = mysqli_fetch_array($var, MYSQL_ASSOC);
				
				$time = date("H:i:s"); 
				$result = mysqli_query($con, "INSERT INTO post VALUES ( ".($last["id"]+1).", '".$x."', '".$y."', '".$time."', '".$z."')");
			}
			$url = '../VIEW/home.php';
		}
		else {
			$url = '../VIEW/titleAlreadyExist.html';
		}
		mysqli_close($con);
		header( "Location: $url" ); 
	}
?>