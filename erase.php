<?php
include 'mysql.php';

$sql0 = "DELETE FROM `comment` WHERE `post_ID` = $_GET[post_ID]";
$sql = "DELETE FROM `post_id` WHERE `post_ID` = $_GET[post_ID]";

$query = @mysql_query($sql0);
$query = @mysql_query($sql);

mysql_close();
header("Location: index.php");
?>