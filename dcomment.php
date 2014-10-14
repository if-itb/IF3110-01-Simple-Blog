<?php
// comment_add.php
include 'mysql.php';
date_default_timezone_set('Asia/Jakarta');

mysql_safe_query('DELETE FROM comment WHERE ComID = %s', $_GET['ComID']);
redirect('post.php?PostID='.$_GET['PostID'].'');
?>