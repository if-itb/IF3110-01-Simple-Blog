<?php
// comment_delete.php
include 'mysql.php';
mysql_safe_query('DELETE FROM comments WHERE id=%s LIMIT 1', $_GET['id']);
mysql_safe_query('UPDATE posts SET num_comments=num_comments-1 WHERE id=%s LIMIT 1', $_GET['post']);
redirect('post.php?id='.$_GET['post']);
?>