<?php

require_once dirname(__DIR__) . "/lib/database.php";

function comment_insert($post_id, $name, $email, $content, $date) {
	$query = "INSERT INTO comments (id, post_id, name, email, content, date)
			  VALUES (NULL, '%post_id%', '%name%', '%email%', '%content%', '%date%')";
	$param = array(
		"post_id" => $post_id,
		"content" => $content,
		  "email" => $email,
		   "name" => $name,
		   "date" => $date
	);
	return db_query($query, $param);
}

function comment_select($post_id, $id = NULL) {
	$query = "SELECT * FROM comments WHERE post_id = '%post_id%'";
	$param = array("post_id" => $post_id);
	if ($id != NULL) {
		$query .= " AND id = '%id%'";
		$param["id"] = $id;
	}
	$query .= " ORDER BY date DESC, id DESC";
	return db_query($query, $param);
}