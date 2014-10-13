<?php

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	require_once __DIR__ . '/db_connect.php';
	if (!isset($db)) {
		$db = new DB_CONNECT();
	}

	$result = mysql_query("SELECT * FROM post WHERE id = '$id'") or die(mysql_error());

	if (mysql_num_rows($result) > 0) {
		$row = mysql_fetch_array($result);

		$post = array();
		$post['title'] = $row['title'];
		$post['time'] = $row['time'];
		$post['featured'] = $row['featured'];
		$post['paragraph'] = $row['paragraph'];
	}
}

?>
