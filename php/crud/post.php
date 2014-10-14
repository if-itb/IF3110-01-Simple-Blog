<?php

require_once dirname(__DIR__) . '/lib/database.php';

function post_insert($title, $content, $date) {
	$query = "INSERT INTO posts (id, title, content, date)
			  VALUES (NULL, '%title%', '%content%', '%date%')";
	$param = array(
		'content' => htmlspecialchars($content),
		  'title' => $title,
		   'date' => $date
	);
	return db_query($query, $param);
}

function post_select($id = null) {
	if ($id) {
		$query = "SELECT * FROM posts WHERE id = '%id%'";
		$param = array('id' => $id);
	} else {
		$query = "SELECT * FROM posts ORDER BY date DESC, id DESC";
		$param = array();
	}
	return db_query($query, $param);
}

function post_update($id, $title, $content, $date) {
	$query = "UPDATE posts
		SET content = '%content%',
			title = '%title%',
			date = '%date%'
		WHERE id = '%id%'";
	$param = array(
		'content' => $content,
		  'title' => $title,
		   'date' => $date,
		     'id' => $id
	);
	return db_query($query, $param);
}

function post_delete($id) {
	$query = "DELETE FROM posts WHERE id = '%id%'";
	$param = array('id' => $id);
	return db_query($query, $param);
}