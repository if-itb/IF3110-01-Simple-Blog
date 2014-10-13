<?php

include("UI.php");

if (isset($_POST['title']) && isset($_POST['time']) && isset($_POST['paragraph'])) {
	require_once __DIR__ . '/db_connect.php';
	$db = new DB_CONNECT();
	
	$title = $_POST['title'];
	$time = dateDDMMYYYYToDB($_POST['time']);
	$paragraph = $_POST['paragraph'];

	$result = mysql_query("INSERT INTO post(title, time, paragraph) VALUES('$title', '$time', '$paragraph')") or die(mysql_error());

	$result = mysql_query("SELECT MAX(id) FROM post") or die(mysql_error());

	if (mysql_num_rows($result) > 0) {
		$row = mysql_fetch_array($result);
		header("Location: post.php?id=" . $row['MAX(id)']);
	}
}

?>
