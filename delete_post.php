<?php
	$pid = $_GET["pid"];
	mysql_connect("localhost","root","");
	@mysql_select_db("simpleblog") or die( "Unable to select database");
	$query = 'DELETE FROM post WHERE idpost='.$pid;
	mysql_query($query);
	header("Location: index.php");
?>