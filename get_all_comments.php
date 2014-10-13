<?php

include("UI.php");

$comments['comment'] = array();

if (isset($_GET['post_id'])) {
	$post_id = $_GET['post_id'];

	require_once __DIR__ . '/db_connect.php';
	if (!isset($db)) {
		$db = new DB_CONNECT();
	}

	$result = mysql_query("SELECT * FROM comment WHERE post_id = '$post_id' ORDER BY id DESC") or die(mysql_error());

	if (mysql_num_rows($result) > 0) {
		while ($row = mysql_fetch_array($result)) {
			$comment = array();
			$comment['post_id'] = $row['post_id'];
			$comment['id'] = $row['id'];
			$comment['time'] = timeAgo($row['time']);
			$comment['name'] = $row['name'];
			$comment['email'] = $row['email'];
			$comment['comments'] = $row['comments'];

			array_push($comments['comment'], $comment);
		}

		$commentsString = "";
		foreach($comments['comment'] as $c) {
			$commentsString .= "<li class=\"art-list-item\">
				<div class=\"art-list-item-title-and-time\">
					<h2 class=\"art-list-title\">" . $c['name'] . "</a></h2>
					<div class=\"art-list-time\">" . $c['time'] . "</div>
				</div>
				<p>" . $c['comments'] . "</p>
			</li>";
		}

		echo $commentsString;
	}
}

?>
