<?php 
	include 'mainviewer.php';
	$postid = $_GET['postid'];
	$con = phpsqlconnection();
	echo "DELETE FROM post WHERE Post_Id=".$postid;
	mysqli_query($con,"DELETE FROM post WHERE Post_Id=".$postid);
	header("Location: index.php");
	die();
 ?>