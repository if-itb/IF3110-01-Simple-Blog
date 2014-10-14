<?php

require_once dirname(__DIR__) . "/crud/post.php";
require_once dirname(__DIR__) . "/lib/url.php";

$content = $_POST["content"];
  $title = $_POST["title"];
   $date = $_POST["date"];

$id = post_insert($title, $content, $date);
header("Location: " . url_view_post($id, array("add" => true)));