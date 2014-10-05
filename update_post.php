<?php
include "connect.php";
//session_start();
$id=$_GET['id']; 
$judul=$_POST['Judul'];
$tanggal=$_POST['Tanggal'];
$konten=$_POST['Konten'];

$sql="UPDATE `post` SET `judul_post`='$judul', `tanggal_post`='$tanggal', `konten_post`='$konten' WHERE `id`='$id'";

if (!mysql_query($sql)) {
  die('Error: ' . mysql_error($con));
}

//mysql_query($sql);
header ('Location: index.php');
mysql_close($con);
?>