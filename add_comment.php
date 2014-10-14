<?php
	
	include("mysql.php");
	$post_id = $_GET['post_id'];
	$Nama = $_GET['name'];
	$Email = $_GET['email'];
	$Tanggal = date("d M Y H:i");
	$Komentar = $_GET['content'];

	mysql_query("
		INSERT INTO comment(post_id,name,email,date,content) 
		values('$id_post','$Nama','$Email','$Tanggal','$Komentar')
	") or die("Comment input failed.");
?>
