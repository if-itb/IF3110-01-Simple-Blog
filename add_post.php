<?php
// post_add.php
date_default_timezone_set('Asia/Jakarta');
include 'mysql.php';
if (!empty($_POST)) {
	if(!mysql_safe_query('INSERT INTO posts (title,body,date) VALUES (%s,%s,%s)', $_POST['title'], $_POST['body'], $_POST['date'])
		echo mysql_error();
	else
		redirect('index.php');
}
?>