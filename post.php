<?php
include_once("assets/php/page/BlogViewPostPage.php");

$page = new BlogViewPostPage($_GET["title"], $_GET["date"]);
$body = $page->create();
print($page->get_page());

?>