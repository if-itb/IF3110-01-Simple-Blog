<?php
include "connect.php";
//session_start();
$id=$_POST['id']; 
$nama=clean($_POST['nama']);
$email=$_POST['email'];
$komentar=clean($_POST['komentar']);
echo $nama;
$sql="INSERT INTO `komentar_post` (`nama`, `email`, `tanggal_kom`, `komentar`, `id`) VALUES ('$nama', '$email', CURRENT_TIMESTAMP, '$komentar', '$id')";


if (!mysql_query($sql)) {
  die('Error: ' . mysql_error($con));
}

function clean($data)
{
	$data= trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
//mysql_query($sql);
//header ('Location: index.php');
?>