<?php
//delete post
$iPost = $_GET['iPost'];

include "db-connector.php";

$query_delete = "DELETE FROM post_content WHERE id=$iPost";
mysql_select_db(db_simpleblog);
$retval = mysql_query($query_delete,$db);
if(! $retval){
	die("Could not delete data : " . mysql_error());
}else {
	header("location:index.php");
}


?>