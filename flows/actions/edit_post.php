<?php

require_once dirname(__DIR__) . "/works/post.php";
require_once dirname(__DIR__) . "/assists/url.php";

$id      = $_POST["id"];
$title   = $_POST["title"];
$date    = $_POST["date"];
$content = $_POST["content"];

$postm   = new Post(); 

$postm->update($id, $title, $date, $content);
header("Location: " . URL::view_post($id, array("edit" => true)));