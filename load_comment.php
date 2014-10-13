<?php
include_once("assets/php/module/PostDataManager.php");
include_once("assets/php/module/CommentDataManager.php");

if(empty($_GET)) {
	
	$title = $_POST["title"];
	$sender = $_POST["sender"];
	$email = $_POST["email"];
	$date = $_POST["date"];
	$comment = $_POST["comment"];
	
	$post = new PostDataManager("assets/data", "assets/data");
	$id = $post->get_id($title, $date);
	
	$data_mgr = new CommentDataManager("assets/data", $id);
	$comment = str_replace("\r\n", "<p>", $comment);
	$retval = $data_mgr->add_comment($sender, $email, $date, $comment);
	
	if($retval === false) {
		print("");
	} else {
		$response = array(
			"sender" => $sender,
			"email" => $email,
			"date" => $date,
			"comment" => $comment
		);
		$json_text = json_encode($response);
		print($json_text);
	}
	
} else {
	
	$date = $_GET["date"];
	$title = $_GET["title"];
	$cmnt_id = $_GET["count"];
	
	$post = new PostDataManager("assets/data", "assets/data");
	$id = $post->get_id($title, $date);
	
	if(strcmp($id, "") === 0) {
		print("");
	} else {
		$data_mgr = new CommentDataManager("assets/data", $id);
		$data = $data_mgr->get_comment($cmnt_id);
		if($data !== "")  {
			$json_text = json_encode($data);
			print($json_text);
		} else {
			print("");
		}
	}
	
}

?>