<?php
include('config.php');
 
$id = $_GET['id'];
 
$query = mysql_query("DELETE FROM `data-post` WHERE `post-id` = '$id'") or die(mysql_error());
 
if ($query) {
    header('location:index.php?message=terhapus');
}
?>