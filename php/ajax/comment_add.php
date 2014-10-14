<?php

require_once dirname(__DIR__) . "/crud/comment.php";

$post_id = $_POST["post_id"];
$content = $_POST["content"];
  $email = $_POST["email"];
   $name = $_POST["name"];
   $date = $_POST["date"];

echo (comment_insert($post_id, $name, $email, $content, $date) > 0) ? "SUCCESS" : "FAILED";