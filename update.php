<?php
	header("Location: index.php");	 
  	require ('sql_connect.inc');
  	sql_connect('blog');
  	$id = $_GET['id'];
  	$judul = $_POST['Judul'];
  	$tanggal = $_POST['Tanggal'];
  	$isi = $_POST['Konten'];
  	//echo $judul;
  	$query = "UPDATE blog SET judul='" . $judul . "', tanggal='".$tanggal."', isi='".$isi."' WHERE id=" . $id;
  	echo $query;
  	mysql_query($query);
?>