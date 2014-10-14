<?php

//create connection
$connect=mysqli_connect("localhost","root", "", "simple_blog");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


mysqli_query($connect,"DELETE FROM posting WHERE ID=".$_GET['id']. " ");

mysqli_close($connect);

header("location: index.php");

?>