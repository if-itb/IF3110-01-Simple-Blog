<?php
	$username = "root";
	$password = "";
	$db = "simpleblog";
	$con = mysqli_connect('localhost', $username,$password,$db) or die("Unable to connect to MySQL");	
	$query = "DELETE FROM `post` WHERE PostID=".$_GET['id'];
	mysqli_query($con,$query) or die("Unable to execute query");
	mysqli_close($con); 
	header('Location: index.php');
?>
