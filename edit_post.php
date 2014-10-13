<?php
include_once("assets/php/page/BlogEditPostPage.php");

$page = new BlogEditPostPage($_GET["title"], $_GET["date"]);
$body = $page->create();
print($page->get_page());

?>