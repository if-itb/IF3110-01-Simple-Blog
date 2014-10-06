<?php	
	if (isset($_GET['p'])) {
		$postId = $_GET['p'];

		$connDb = mysqli_connect("localhost", "root", "", "simple_blog");
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}		

		$sqlQuery = "DELETE FROM `simple_blog`.`post` where `id_post`='$postId'";
		
		if (!mysqli_query($connDb, $sqlQuery)) {
			die('Error: ' . mysqli_error($connDb));
		}
		mysqli_close($connDb);

		header('Location: index.php');
		die();	
	}

?>