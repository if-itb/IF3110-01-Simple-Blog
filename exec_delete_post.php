<?php
	$pid = $_GET['pid'];
	$mysql = mysql_connect("localhost","root","");
	mysql_select_db("simple_blog");
	if(!$mysql)
		die('DB Ngga bisa dibuka : '.mysql_error());
	$qry = "DELETE FROM `simple_blog`.`sb_post` WHERE `sb_post`.`post_id` = " . $pid;
	mysql_query($qry);
	$qry = "DELETE FROM `simple_blog`.`sb_comments` WHERE `sb_comments`.`post_id` = " . $pid;
	mysql_query($qry);
	mysql_close($mysql);
	header('Location:' . dirname($_SERVER[HTTP_HOST]));
?>