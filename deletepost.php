<?php
if(!isset($_GET['id'])){
	header('location:index.php');
}
$postid=$_GET['id'];
$db=mysqli_connect("Localhost","root","","wbdsimpleblog");
if(mysqli_connect_errno()){
	echo "Failed to connect to MySQL: ".mysqli_connect_error();
}
$sql = "delete from post where pid=$postid";
if (!mysqli_query($db,$sql)) {
	die('Error: ' . mysqli_error($db));
}
mysqli_close($db);
header('location:index.php');
?>
