<?php
	include("connect.php");
	$id=$_GET['id'];
	$query	=	mysql_query("DELETE from post WHERE no=$id");
	echo "<script>alert('Posting berhasil dihapus');window.location.assign('".$_SERVER['HTTP_REFERER']."');</script>";
?>
