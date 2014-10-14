<?php

include 'mysql.php';
$id=$_POST['id'];

$result = mysql_safe_query('SELECT * FROM comments WHERE post_id=%s ORDER BY date DESC', $id);
echo '<ol id="comments">';
while($row = mysql_fetch_assoc($result)) {
	echo '<li id="post-'.$row['id'].'">';
	echo ('<strong>'.$row['name'].'</strong>');
	echo (' <em>'.$row['email'].'</em>');
	echo ' (<a href="delete-comment.php?id='.$row['id'].'&post='.$id.'">Delete</a>)<br/>';
	echo '<small>'.date($row['date']).'</small><br/>';
	echo nl2br($row['content']);
	echo '</li>';
}
?>