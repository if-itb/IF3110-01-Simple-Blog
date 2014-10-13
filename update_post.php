<?php

include("UI.php");

if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['time']) && isset($_POST['paragraph'])) {
	$id = $_POST['id'];
	$title = $_POST['title'];
	$time = dateDDMMYYYYToDB($_POST['time']);
	$paragraph = $_POST['paragraph'];

	require_once __DIR__ . '/db_connect.php';
	if (!isset($db)) {
		$db = new DB_CONNECT();
	}

	$result = mysql_query("UPDATE post SET title = '$title', time = '$time', paragraph = '$paragraph' WHERE id = '$id'") or die(mysql_error());

	header("Location: post.php?id=" . $id);
}

?>
