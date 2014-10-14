<?php

if (isset($_POST['name']) && isset($_POST['Email']) && isset($_POST['comments'])) {
	require_once __DIR__ . '/connect_db.php';
	
	$db = new connect_db();
	$nama = $_POST['name'];
	$email = $_POST['Email'];
	$komen = $_POST['comments'];
	$id = $_POST['post_id'];
	$time = $_POST['Tanggal'];
	
	echo "tes";
	echo $nama;
	
	mysql_query("INSERT INTO simple_komen VALUES('$id', '$nama', '$time', '$komen', '$email')") or die(mysql_error());
	
	header("Location: post.php?id=" . $id);
}

?>