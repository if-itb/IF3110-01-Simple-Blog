<?php
	
	$con = mysqli_connect("localhost","root","","tugaswbd1");
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySql";
    }

    if(isset($_GET['id'])){
    	$deletedID = $_GET['id'];
    	mysqli_query($con,"DELETE FROM post WHERE post_id = '$deletedID'");
  		header("Location: index.php");
    }
?>