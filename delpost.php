<?php
	mysql_connect("localhost", "root", "");
	mysql_select_db("simpleblog");
	$var = $_GET['postid'];
	mysql_query("DELETE FROM post WHERE id = $var");
	header('Location:index.php');
?>
