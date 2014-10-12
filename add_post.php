<?php
include "mysql.php";

$judul = $_POST['Judul'];
$tanggal = $_POST['Tanggal'];
$konten = $_POST['Konten'];

$sql = $con->query("INSERT INTO post (judul, tanggal, konten) VALUES
		('$judul', '$tanggal', '$konten')");

if ($sql)
	echo "<br>Tambah post berhasil";
else
	echo "<br>Tambah post gagal";

header('Location: index.php');
exit();
?>