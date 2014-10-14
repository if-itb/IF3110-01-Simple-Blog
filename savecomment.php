<?php
	include "database.php";

	$id=$_POST['post_id']; 
	$author=$_POST['author'];
	$email=$_POST['email'];
	$content=$_POST['content'];

	$pdo = Database::connect();
	$query = "INSERT INTO comment(author, email, content, post_id, created_at, updated_at) VALUES ('$author', '$email', '$content', '$id', CURRENT_TIMESTAMP, '')";

	$q = $pdo->prepare($query);
	$q->execute();
	Database::disconnect();

	header("Location: post.php?id=$id");
?>
