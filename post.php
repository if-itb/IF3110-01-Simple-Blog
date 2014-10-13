<?php
	include("connect.php");
	$judul	=	$_POST['judul'];
	$tanggal = $_POST['tanggal'];
	$konten	=	$_POST['konten'];
	$isfeatured	=	$_POST['isFeatured'];
	if($query	=	mysql_query("INSERT INTO post(judul,tanggal,konten,isFeatured) VALUES ('$judul','$tanggal','$konten','$isfeatured')")){
		echo "<script>alert('Posting berhasil ditambah');window.location.assign('new_post.html')</script>";
	}else{
		echo "<script>alert('Posting gagal ditambahkan')</script>";
	}
?>
