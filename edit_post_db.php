<?php
include "mysql.php";

$idpost = $_GET['id'];
$judul = $_POST['Judul'];
$tanggal = $_POST['Tanggal'];
$konten = $_POST['Konten'];

$sql = $con->query("UPDATE post SET judul='$judul', tanggal='$tanggal', konten='$konten' WHERE id_post='$idpost'");
if ($sql)
	header('Location: index.php');
exit();
?>