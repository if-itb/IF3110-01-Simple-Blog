<?php
	include('config.php');
	
    $judul = $_POST['Judul'];
    $tanggal = $_POST['Tanggal'];
    $konten = $_POST['Konten'];

    $query = mysql_query("INSERT INTO `data-post`(`judul`, `tanggal`, `konten`) VALUES ('$judul','$tanggal','$konten')") or die(mysql_error());
        if ($query) {
		    header('location:index.php?message=berhasil');
		}
?>