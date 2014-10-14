<?php
header('Location: index.php');
// Create connection
$con=mysqli_connect("localhost","root","","blog_posts");
$id = $_GET['id'];
echo $id;
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "DELETE FROM post WHERE post_id ='$id'";
if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
}
mysqli_close($con);
?>