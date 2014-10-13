<?php
	header("location:index.php");
	include 'connection.php';
	$id = $_GET['var'];

    $sql1="DELETE FROM postingan WHERE ID=$id";
    $sql2="DELETE FROM komentar WHERE ID=$id";
    if (!mysqli_query($con,$sql1)) {
    	if (!mysqli_query($con,$sql2)) {
    		die('Error: ' . mysqli_error($con));
    	}
    }
?>