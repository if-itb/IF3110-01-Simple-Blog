<?php	
	if (isset($_GET['p'])) {
		$postId = $_GET['p'];

		include 'dbconnect.php';

		$sqlQuery = "DELETE FROM `simple_blog`.`post` where `id_post`='$postId'";
		
		if (!mysqli_query($connDb, $sqlQuery)) {
			die('Error: ' . mysqli_error($connDb));
		}		

		header('Location: index.php');
		die();	
	}

?>