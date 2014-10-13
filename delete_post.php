<?php
	require __DIR__.'/db.php';
	if (isset($_POST['id'])){
		deletePost($_POST['id']);
	}
	header('location:index.php');
?>