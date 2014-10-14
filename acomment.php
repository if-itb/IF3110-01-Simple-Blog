<?php
// comment_add.php
include 'mysql.php';
date_default_timezone_set('Asia/Jakarta');

$PostID=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$content=$_POST['content'];

$query = mysql_safe_query('INSERT INTO comment (PostID,Date,Name,Email,Comment) VALUES (%s,%s,%s,%s,%s)', $PostID, date('Y-m-d H:i:s'), $name, $email, $content);
if ($query) {
    echo "sent";
}

?>