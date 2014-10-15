<?php

require_once dirname(__DIR__) . "/works/comment.php";

$post_id = $_POST["post_id"];
$name    = $_POST["name"];
$email   = $_POST["email"]
$date    = $_POST["date"];
$content = $_POST["content"];

$comt = new Comment();
echo ($comt->insert($post_id, $name, $email, $date, $content) > 0) ? "SUCCESS" : "FAILED";