<?php

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	require_once __DIR__ . '/db_connect.php';
	if (!isset($db)) {
		$db = new DB_CONNECT();
	}

	$result = mysql_query("DELETE FROM post WHERE id = '$id'") or die(mysql_error());

	header("Location: index.php");
}

?>
