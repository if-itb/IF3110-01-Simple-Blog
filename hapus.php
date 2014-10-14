

<?php 
$con=mysqli_connect("localhost", "root", "", "dataPost");
$postid= $_GET['postid'];
$sql = "DELETE FROM posts WHERE PID = $postid";
if(!mysqli_query($con,$sql)){
die('error');}

mysqli_close($con);
header("location: index.php");?>