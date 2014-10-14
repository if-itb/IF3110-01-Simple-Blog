<?php
	// memeriksa koneksi ke database
	mysql_connect("localhost", "root", "");
	mysql_select_db("simpleblog");	
	$var = $_GET['postid'];
	//memasukan data aksi ke database
	mysql_query("UPDATE post  SET judul = '".$_POST['Judul']."', tanggal = '".$_POST['Tanggal']."', konten = '".$_POST['Konten']."'
	WHERE id = '$var'");
	header('Location:index.php');
?>
