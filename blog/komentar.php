<?php
$con=mysqli_connect("localhost","root","","simpleblog");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$nama = mysqli_real_escape_string($con, $_GET['Nama']);
$email = mysqli_real_escape_string($con, $_GET['Email']);
$komentar = mysqli_real_escape_string($con, $_GET['Komentar']);
$Id = $_GET["Id"];

mysqli_query($con,"INSERT INTO komentar (Nama , Email , Komentar, Id_Post)
VALUES ('$nama', '$email', '$komentar' , '$Id')");
echo "ok";
mysqli_close($con);
//header('Location: index.php');
?>