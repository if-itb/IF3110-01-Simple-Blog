<?php

require_once dirname(__DIR__) . '/crud/post.php';
require_once dirname(__DIR__) . '/lib/url.php';

$id = $_GET['id'];
post_delete($id);
header('Location: ' . url());