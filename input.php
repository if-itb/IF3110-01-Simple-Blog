<?php
	include "koneksi.php";
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
	$insert = "INSERT INTO tblblog (judul, tanggal, konten) VALUES ('$judul',
	'$tanggal', '$konten')";
	$insert_query = mysql_query($insert);
	if($insert_query){
		header('location:index.php');
	} 
?>
