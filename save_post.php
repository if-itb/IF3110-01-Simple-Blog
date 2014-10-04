<?php
include "connect.php";
//session_start();
$judul=$_POST['Judul'];
$tanggal=$_POST['Tanggal'];
$konten=$_POST['Konten'];

$sql="INSERT INTO `post` (`judul`, `tanggal`, `konten`) VALUES ('$judul', '$tanggal', '$konten')";

if (!mysql_query($sql)) {
  die('Error: ' . mysql_error($con));
}

//mysql_query($sql);
//header ('Location: index.php');
mysql_close($con);
?>