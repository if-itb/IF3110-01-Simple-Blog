<?php
	 include "koneksi.php"; 
	$id = $_GET['id'];
	
	if(isset($_POST)) {
		if(isset($_POST["Judul"])){
			$judul = $_POST['Judul'];
		}
		if(isset($_POST["Konten"])){
			$konten = $_POST['Konten'];
		}
		if(isset($_POST["Judul"])){
			$tanggal = $_POST['Tanggal'];
		}
	}
	
	$insert = "UPDATE `tblblog` SET `judul`='$judul', `tanggal`='$tanggal', `konten`='$konten' WHERE `id`='$id' ";
	$insert_query = mysql_query($insert);
	if($insert_query){
		header('location:index.php');
	} 
?>

