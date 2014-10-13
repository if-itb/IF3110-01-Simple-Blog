<?php
include_once("assets/php/page/BlogMainPage.php");

$page = new BlogMainPage();
$body = $page->create();
print($page->get_page());

?>