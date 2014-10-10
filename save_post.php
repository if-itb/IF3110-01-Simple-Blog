<?php
include "connect.php";

$judul=$_POST['Judul'];
$tanggal=$_POST['Tanggal'];
$konten=$_POST['Konten'];

$sql="INSERT INTO `post` (`judul_post`, `tanggal_post`, `konten_post`) VALUES ('$judul', '$tanggal', '$konten')";

if (!mysql_query($sql)) {
  die('Error: ' . mysql_error($con));
}

header ('Location: index.php');
mysql_close($con);
?>