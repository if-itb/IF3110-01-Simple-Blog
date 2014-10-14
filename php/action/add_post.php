<?php

require_once dirname(__DIR__) . '/crud/post.php';
require_once dirname(__DIR__) . '/lib/url.php';

$title = $_POST['title'];
$content = $_POST['content'];
$date = $_POST['date'];

$id = post_insert($title, $content, $date);
header('Location: ' . url_view_post($id, array('add' => true)));