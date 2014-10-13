<?php

include "mysql.php";

$table1 = "comment";
$sql 	= "INSERT INTO `$table1` SET
	`post_ID` = '$_POST[post_ID]',
	`comm_DT` = '$_POST[comm_DT]',
	`comm_Body` = '$_POST[comm_Body]'
	`comm_email` = '$_POST[comm_email]'
	`author` = '$_Post[author]'";

	$query = @mysql_query($sql);


mysql_close();
?>