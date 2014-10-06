<?php
include('connectdb.php');

$judul = $_POST['Judul'];
$tanggal = $_POST['Tanggal'];
$konten = $_POST['Konten'];

$query = mysql_query("insert into post values ('', '$judul', '$tanggal', '$konten')") or die (mysql_error());

if($query){
	 header('location:index.php');
}
mysql_close();
?>