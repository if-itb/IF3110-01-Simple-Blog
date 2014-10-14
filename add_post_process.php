<?php
	// membuat koneksi dengan database "simpleblog"
	include("connect_db.php");

	if(isset($_POST['submit'])){
		$judul = htmlspecialchars($_POST['Judul']);
		$tanggal = htmlspecialchars($_POST['Tanggal']);
		$konten = htmlspecialchars($_POST['Konten']);

		mysql_query("
			INSERT INTO post(Judul,Tanggal,Konten) 
			VALUES('$judul','$tanggal','$konten')
		") or die("Post baru tidak berhasil ditambahkan ke database simple_blog");

		mysql_close($connection);
		header("location:index.php");
	}
?>
