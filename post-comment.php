<?php
// comment_add.php
include 'mysql.php';
date_default_timezone_set('Asia/Jakarta');

$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$content=$_POST['content'];

$query = mysql_safe_query('INSERT INTO comments (post_id,name,email,content,date) VALUES (%s,%s,%s,%s,%s)', $id, $name, $email, $content, date('Y-m-d H:i:s'));
if ($query) {
	echo "sent";
}

?>