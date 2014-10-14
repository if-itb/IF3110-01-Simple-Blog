<?php
	include("connect_db.php");

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		mysql_query("
			DELETE FROM post 
			WHERE id = '$id'
		") or die("Post gagal dihapus!");

		mysql_query("
			DELETE FROM comment 
			WHERE id_post = '$id'
		") or die("Komentar dalam post gagal dihapus!");

		header("location:index.php");
	}
	else{
		echo "Post tidak dapat dihapus";
	}
?>
