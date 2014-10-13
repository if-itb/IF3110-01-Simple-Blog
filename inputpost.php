<?php
include('connectdb.php');
$judul = $_POST['judul'];
$tanggal = $_POST['tanggal'];
$konten = $_POST['konten'];

$query = mysql_query("insert into post values ('', '$judul', '$tanggal', '$konten')") or die (mysql_error());
header('location:index.php');

?>