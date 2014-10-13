<?php

if (isset($_POST['post_id']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['comments'])) {
	$post_id = $_POST['post_id'];
	$time = date("Y-m-d H:i:s");
	$name = $_POST['name'];
	$email = $_POST['email'];
	$comments = $_POST['comments'];
	
	require_once __DIR__ . '/db_connect.php';
	if (!isset($db)) {
		$db = new DB_CONNECT();
	}

	$result = mysql_query("INSERT INTO comment(post_id, time, name, email, comments) VALUES('$post_id', '$time', '$name', '$email', '$comments')") or die(mysql_error());
}

?>
