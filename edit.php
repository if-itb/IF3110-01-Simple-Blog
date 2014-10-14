<?php

require 'database.php';

$pid = null;
if (!empty($_GET['pid'])){
	$pid = $_REQUEST['pid'];
}
if (null == $pid){
	header("Location: index.php");
}
if (!empty($_POST)){
	$titleerror = null;
	$dateerror = null;
	$contenterror = null;

	$title = $_POST['Judul'];
	$date = $_POST['Tanggal'];
	$content = $_POST['Konten'];
	$valid = true;
	if (empty($title)){
		$titleerror = "Judul harus diisi!"; #pesan error blm tampil
		$valid = false;
	}
	if (empty($date)){
		$dateerror = "Tanggal harus diisi!"; #pesan error blm tampil
		#sisipkan validasi untuk tanggal >= timestamp
		$valid = false;
	}
	if (empty($content)){
		$contenterror = "Konten harus diisi!"; #pesan error blm tampil
		$valid = false;
	}

	if ($valid){
		$sambung = mysql_connect("localhost:3306","root","");
		if (!$sambung) {
			die('Tidak bisa tersambung: ' . mysql_error());
		}
		mysql_select_db("simpleblog");
		$post = "UPDATE blogitem SET posttitle='$title', postdate='$date', postcontent='$content' WHERE pid='$pid' ";
		if (!mysql_query($post,$sambung)){
			die('Error: ' . mysql_error());
		}

		mysql_close($sambung);
		header("Location: post.php?pid=$pid");
		}
}


?>