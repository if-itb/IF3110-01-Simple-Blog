<?php
	include 'dbconnect.php';
	include 'header.php';
	
	$postId = $_GET['idpost'];
	$sqlQuery = "SELECT * FROM `simple_blog`.`komentar` WHERE `id_post`='$postId'";	
	$result = mysqli_query($connDb, $sqlQuery);              
	
	$stringBuilder = '';
	while($comment = mysqli_fetch_array($result)) {
		$stringBuilder .= '<li class="art-list-item"><div class="art-list-item-title-and-time"><h2 class="art-list-title"><a href="#">'.$comment['nama'].'</a></h2><div class="art-list-time">'.printReadableDateFormatWithTime($comment['tanggal']).'</div></div><p>'.$comment['isi_komentar'].'</p></li>';
	}	
	echo $stringBuilder;	
?>