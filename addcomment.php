<?php
	require("sqlconnect.php");
	$id = $_GET["id"];
	$nama = $_GET["nama"];
	$email = $_GET["email"];
	$komentar = $_GET["komentar"];
	$addquery = "INSERT INTO postdata.komentar VALUES ('', '$id', '$komentar', NOW(), '$email', '$nama')";
	mysql_query($addquery, $connection);
	require("listcomment.php");
?>