<?php
include_once("assets/php/page/BlogNewPostPage.php");

$page = new BlogNewPostPage();
$body = $page->create();
print($page->get_page());

?>