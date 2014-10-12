<?php

include "mysql.php";

$table1 = "post_id";
$sql 	= "INSERT INTO `$table1` SET
	`posted_title` = '$_POST[Judul]',
	`posted_Date` = '$_POST[Tanggal]',
	`posted_body` = '$_POST[Konten]'";
if (isset($_POST['Judul']) && isset($_POST['Tanggal']) && isset($_POST['Konten'])){
	$query = @mysql_query($sql);
}

mysql_close();
header("Location: index.php");
?>