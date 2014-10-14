<?php
// Create connection
$con=mysqli_connect("localhost","root","","blog_content");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$nama = mysqli_real_escape_string($con, $_POST['Nama']);
$email = mysqli_real_escape_string($con, $_POST['Email']);
$komentar = mysqli_real_escape_string($con, $_POST['Komentar']);
$id_blog = mysqli_real_escape_string($con, $_POST['Id_blog']);

$sql = "INSERT INTO `komentar`(`ID_BLOG`, `NAMA`, `EMAIL`, `KOMENTAR`)
VALUES ($id_blog,'$nama','$email','$komentar')";



if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}


mysqli_close($con);
?>