<?php
	require_once(dirname(__FILE__).'/db_controller.php');
	
	$db = new DB();

	if (isset($_POST["load_comment"])) {
		echo json_encode($db->getComments($_POST["post_id"]));
	}
	else if (isset($_POST["post_comment"])) {
		$post_id = $_POST["post_id"];
		$nama = htmlentities($_POST["nama"]);
		$email = htmlentities($_POST["email"]);
		$komentar = htmlentities($_POST["komentar"]);
		$newComment = $db->comment($post_id, $nama, $email, $komentar);
		echo json_encode($newComment);
	}
?>
