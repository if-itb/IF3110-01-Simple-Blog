<?php
include_once("assets/php/module/PostDataManager.php");
include_once("assets/php/module/CommentDataManager.php");

$title = $_GET["title"];
$date = $_GET["date"];

$data_mgr = new PostDataManager("assets/data", "assets/data");
$id = $data_mgr->get_id($title, $date);
$data_mgr->delete_post($title, $date);

$data_mgr = new CommentDataManager("assets/data", $id);
$data_mgr->delete_all_comment();

header("Location: index.php");


?>