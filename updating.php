<?php
	include "db.php";

	if(@$_POST['konten']!="")
	{
	
		
	
		$id=mysql_real_escape_string($_POST['id']);
		$judul=mysql_real_escape_string($_POST['judul']);
		$tanggal=mysql_real_escape_string($_POST['tanggal']);
		$konten=mysql_real_escape_string($_POST['konten']);
		
		if($tanggal=="")$tanggal = date('Y-m-d');
		
		$sql = "UPDATE `simpleblog`.`blog` SET `judul` = '$judul', `tanggal` = '$tanggal', `konten` = '$konten' WHERE `blog`.`id` = $id";
		mysql_query($sql);
		

		// di sini, tempatkan kode untuk redirect ke halaman utama...
		header("Location: http://localhost/simpleblog/index.php");
		die();
	}

