<?php
	include('connect.php');
	$Judul = $_POST['Judul'];
	$Tanggal = $_POST['Tanggal'];
	$Konten = $_POST['Konten'];
	
	$query = mysql_query("insert into post values('','$Judul','$Tanggal','$Konten')") or die(mysql_error());
	if($query){
		header('location:index.php');
	}
?>