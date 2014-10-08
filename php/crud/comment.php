<?php

require_once dirname(__DIR__) . '/lib/database.php';

function comment_insert($post_id, $name, $email, $content, $date) {
	$query = "INSERT INTO comments (id, post_id, name, email, content, date)
			  VALUES (NULL, '%post_id%', '%name%', '%email%', '%content%', '%date%')";
	$param = array(
		'post_id' => $post_id,
		'content' => $content,
		  'email' => $email,
		   'name' => $name,
		   'date' => $date
	);
	return db_query($query, $param);
}

function comment_select($post_id = null, $id = null) {
	$query = "SELECT * FROM comments WHERE TRUE ";
	if ($post_id) {
		$post_id_q = mysqli_real_escape_string($db, $post_id);
		$query .= "AND post_id = '%post_id%' ";
	}
	if ($id) {
		$id_q = mysqli_real_escape_string($db, $id);
		$query .= "AND id = '%id%' ";
	}
	$param = array(
		'post_id' => $post_id,
		     'id' => $id
	);
	return db_query($query, $param);
}

function comment_update($id, $name, $email, $content, $date) {
	$query = "UPDATE posts
		SET content = '%content%',
			email = '%email%',
			name = '%name%',
			date = '%date%'
		WHERE id = '%id%'";
	$param = array(
		'content' => $content,
		  'email' => $email,
		   'name' => $name,
		   'date' => $date,
		     'id' => $id
	);
	return db_query($query, $param);
}

function comment_delete($id) {
	$query = "DELETE FROM comments WHERE id = '%id%'";
	$param = array('id' => $id);
	return db_query($query, $param);
}