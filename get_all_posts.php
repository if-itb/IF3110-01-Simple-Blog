<?php

$posts['post'] = array();

require_once __DIR__ . '/db_connect.php';
if (!isset($db)) {
	$db = new DB_CONNECT();
}

$result = mysql_query("SELECT * FROM post ORDER BY id DESC") or die(mysql_error());

if (mysql_num_rows($result) > 0) {
	while ($row = mysql_fetch_array($result)) {
		$post = array();
		$post['id'] = $row['id'];
		$post['title'] = $row['title'];
		$post['time'] = $row['time'];
		$post['featured'] = $row['featured'];
		$post['paragraph'] = $row['paragraph'];

		array_push($posts['post'], $post);
	}
}

?>
