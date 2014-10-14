<?php

if (isset($_POST['Judul']) && isset($_POST['Tanggal']) && isset($_POST['Konten'])) {
	require_once __DIR__ . '/connect_db.php';
	
	$db = new connect_db();
	$title = $_POST['Judul'];
	$time = $_POST['Tanggal'];
	$konten = $_POST['Konten'];
	
	mysql_query("INSERT INTO simple_post(judul, tanggal, konten) VALUES('$title', '$time', '$konten')") or die(mysql_error());
	
	$result = mysql_query("SELECT MAX(pid) FROM simple_post") or die(mysql_error());
	
	if (mysql_num_rows($result) > 0) {
		$row = mysql_fetch_array($result);
		header("Location: post.php?id=" . $row['MAX(pid)']);
	}
}

?>