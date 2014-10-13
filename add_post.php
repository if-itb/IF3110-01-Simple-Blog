<?php
include "mysql.php";

$judul = $_POST['Judul'];
$tanggal = $_POST['Tanggal'];
$konten = $_POST['Konten'];

$sql = $con->query("INSERT INTO post (judul, tanggal, konten) VALUES
		('$judul', '$tanggal', '$konten')");
if ($sql){
	header('Location: index.php');
}
exit();
?>
