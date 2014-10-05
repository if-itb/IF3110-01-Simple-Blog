<?php
	include("connect.php");
	$nama		=	$_POST['nama'];
	$email   	=	$_POST['email'];
	$tanggal 	= 	date('Y-m-d');
	$pesan		=	$_POST['pesan'];
	$id 		=	$_POST['id'];
	if($query	=	mysql_query("INSERT INTO comments(com_name,com_email,com_date,com_dis,post_id_fk) VALUES ('$nama','$email','$tanggal','dsadsadsa','$id')")){
		echo "<script>alert('Komentar berhasil ditambah');window.location.assign('".$_SERVER['HTTP_REFERER']."')</script>";
	}else{
		echo "<script>alert('Komentar gagal ditambahkan')</script>";
	}
?>
