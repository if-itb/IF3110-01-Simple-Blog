<?php
	require_once(dirname(__FILE__).'/db_controller.php');
	
	$db = new DB();

	if (isset($_POST["load_comment"])) {
		echo json_encode($db->getComments($_POST["post_id"]));
	}
	else if (isset($_POST["post_comment"])) {
		$post_id = $_POST["post_id"];
		$nama = $_POST["nama"];
		$email = $_POST["email"];
		$komentar = $_POST["komentar"];
		$newComment = $db->comment($post_id, $nama, $email, $komentar);
		$newComment["nama"] = htmlentities($newComment["nama"]);
		$newComment["email"] = htmlentities($newComment["email"]);
		$newComment["komentar"] = htmlentities($newComment["komentar"]);
		echo json_encode($newComment);
	}
?>
