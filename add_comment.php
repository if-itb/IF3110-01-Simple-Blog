<?php
	$id_post = $_POST['id_post'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$komentar = $_POST['komentar'];

	$tanggal = date('Y-m-d H:i:s');

	include("db_connect.php");
	$query = 'INSERT INTO komentar (nama, email, tanggal, komentar, id_post) VALUES ("'.$nama.'", "'.$email.'","'.$tanggal.'","'.$komentar.'", "'.$id_post.'")';
	mysql_query($query);

	$comment = '<li class="art-list-item"><div class="art-list-item-title-and-time"><h2 class="art-list-title"><a href="#">'.$nama.'</a></h2><div class="art-list-time">'.$tanggal.'</div></div><p>'.$komentar.'</p></li>';
	echo $comment;
?>