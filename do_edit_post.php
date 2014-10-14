<?php

if (isset($_POST['Judul']) && isset($_POST['Tanggal']) && isset($_POST['Konten']) && isset($_POST['Ide'])) {
	require_once __DIR__ . '/connect_db.php';
	
	$db = new connect_db();
	$title = $_POST['Judul'];
	$time = $_POST['Tanggal'];
	$konten = $_POST['Konten'];
	$id = $_POST['Ide'];
	
	mysql_query("UPDATE simple_post SET judul='$title', tanggal='$time', konten='$konten' WHERE pid='$id'") or die(mysql_error());
	
	header("Location: post.php?id=" . $id);
}

?>