<?php
	include("connect_db.php");

	if(isset($_POST['submit'])){
		session_start();
		$id = $_SESSION["id"];
		session_destroy();
		$judul = htmlspecialchars($_POST['Judul']);
		$tanggal = htmlspecialchars($_POST['Tanggal']);
		$konten = htmlspecialchars($_POST['Konten']);

		mysql_query("
			UPDATE post 
			SET Judul='$judul', Tanggal='$tanggal', Konten='$konten' 
			WHERE id='$id'
		") or die("Post baru tidak berhasil diubah");

		mysql_close($connection);
		header("location:post.php?id=$id");
	}
?>
