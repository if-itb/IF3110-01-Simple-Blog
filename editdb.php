<?php
include('connectdb.php');
session_start();
$id_post = $_GET['id_post'];
$judul = $_POST['Judul'];
$tanggal = $_POST['Tanggal'];
$konten = $_POST['Konten'];

$query = mysql_query("UPDATE post SET judul='$judul', tanggal='$tanggal', konten='$konten' WHERE id_post='$id_post'") or die (mysql_error());

if($query){
	 header('location:index.php');
}
mysql_close();
?>