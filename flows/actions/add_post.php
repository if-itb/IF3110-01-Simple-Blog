<?php

require_once dirname(__DIR__) . "/works/post.php";
require_once dirname(__DIR__) . "/assists/url.php";

$title   = $_POST["title"];
$date    = $_POST["date"];
$content = $_POST["content"];

$postm   = new Post();

$id = $postm->insert($title, $date, $content);
header("Location: " . URL::view_post($id, array("add" => true)));