<?php
//create connection
$con=mysqli_connect("localhost","root","asdasd123","blog");

//check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL : " . mysqli_connect_error();
}

$id_delete = $_GET['id_delete'];

mysqli_query($con, "DELETE FROM post WHERE id_post = '$id_delete'");

mysqli_close($con);
header("Location: index.php");

?>