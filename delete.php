<?php 	
//open connection to db
$db_post = mysqli_connect('localhost','root', "", 'simpleblog');

//get from param
$id = $_GET["id"];

$query = "DELETE FROM `listpost` WHERE `idx` = $id";
			  
if(!mysqli_query($db_post, $query))
{
	die('Error ' . mysqli_errno($db_post));
}

//close connection with database
mysqli_close($db_post);
header('Location: index.php');
?>