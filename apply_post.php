<?php

include "mysql.php";

$table1 = "post_id";
$sql 	= "UPDATE '$table1' SET
	`posted_title` = '$_POST[Judul]',
	`posted_Date` = '$_POST[Tanggal]',
	`posted_body` = '$_POST[Konten]' WHERE `post_ID` = '$_GET[post_ID]'";


$query = @mysql_query($sql);
header("Location: index.php");
?>