<?php
include "connect.php";
//session_start();
$id=$_GET['id'];
$judul=$_POST['judul'];
$tanggal=$_POST['tanggal'];
$konten=$_POST['konten'];

$sql="UPDATE `post` SET `judul`='$judul', `tanggal`='$tanggal', `konten`='$konten' WHERE `id`='$id'";

if (!mysql_query($sql)) {
  die('Error: ' . mysql_error($con));
}

//mysql_query($sql);
header ('Location: index.php');
mysql_close($con);
?>