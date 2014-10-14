<?php
	// memeriksa koneksi ke database
	mysql_connect("localhost", "root", "");
	mysql_select_db("simpleblog");	
	//memasukan data aksi ke database
	mysql_query("INSERT INTO post (judul,tanggal,konten) VALUES 
	('".$_POST['Judul']."','".$_POST['Tanggal']."','".$_POST['Konten']."')");
	header('Location:index.php');
?>
