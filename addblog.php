<?php
	include "db.php";

	if(@$_POST['konten']!="")
	{
		$judul=mysql_real_escape_string($_POST['judul']);
		$tanggal=mysql_real_escape_string($_POST['tanggal']);
		$konten=mysql_real_escape_string($_POST['konten']);
		if($tanggal=="")$tanggal = date('Y-m-d');
		mysql_query("INSERT INTO blog (judul,tanggal,konten) VALUES('$judul','$tanggal','$konten');");
		echo $judul . '<br />';
		echo $tanggal . '<br />';
		echo $konten . '<br />';
		// di sini, tempatkan kode untuk redirect ke halaman utama...
		header("Location: http://localhost/simpleblog/index.php");
		die();
	}

