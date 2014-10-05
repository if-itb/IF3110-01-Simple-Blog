<?php 	
	
	//establish connection to database
	$con = mysqli_connect('localhost', 'root', "", 'simple_blog');
	$id = mysqli_real_escape_string($con, $_POST['id']);
	
	//query for deleting entry
	$query = "DELETE FROM `info_post` 
			  WHERE `id` = $id";
			  
	if(!mysqli_query($con, $query))
	{
		die('Error ' . mysqli_errno($con));
	}
	
	echo "<br>entry has been deleted.";
	
	//close connection with database
	mysqli_close($con);
	header('Location: index.php');
?>