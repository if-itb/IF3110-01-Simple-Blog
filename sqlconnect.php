<?php
	$connection = mysql_connect("localhost", "root", "");
	if(!$connection)
	{
		die('Could not connect : '.mysql_error());
	}
	else
	{
		$dbcheck = mysql_select_db("postdata");
	}
?>