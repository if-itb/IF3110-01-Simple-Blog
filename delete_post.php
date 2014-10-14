<?php
// post_delete.php
include 'mysql.php';
date_default_timezone_set('Asia/Jakarta');
mysql_safe_query('DELETE FROM post WHERE PostID=%s LIMIT 1', $_GET['PostID']);
mysql_safe_query('DELETE FROM comment WHERE PostID=%s', $_GET['PostID']);
redirect('index.php');
?>