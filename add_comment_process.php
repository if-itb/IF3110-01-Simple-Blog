<?php
	
	include("connect_db.php");
	$id_post = $_GET['id_post'];
	$Nama = $_GET['nama'];
	$Email = $_GET['email'];
	$Tanggal = date("d M Y H:i");
	$Komentar = $_GET['komentar'];

	mysql_query("
		INSERT INTO comment(id_post,Nama,Email,Tanggal,Komentar) 
		values('$id_post','$Nama','$Email','$Tanggal','$Komentar')
	") or die("Gagal menambahkan komentar");
?>
