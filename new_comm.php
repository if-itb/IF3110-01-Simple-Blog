<?php

include "mysql.php";

$table1 = "comment";

$sql 	= "INSERT INTO `$table1` SET
	`post_ID` = '$_GET[post_ID]',
	`comm_DT` = CURDATE(),
	`comm_Body` = '$_GET[comment]',
	`comm_email` = '$_GET[email]',
	`author` = '$_GET[author]'";

	$query = @mysql_query($sql);

mysql_close();

include "get_comments.php";
?>