<?php
	include "mysql.php";
	$table = "ENTRIES";
	if($_GET['querytype'] == 1)
	{
		$sql = "UPDATE $table SET
		TITLE = '$_POST[title]',
		TANGGAL = '$_POST[tanggal]',
		CONTENT	= '$_POST[content]' WHERE ID = '$_GET[id]'";
		$query = mysql_query($sql);
		header("Location: post.php?id=$_GET[id]");

	}
	else
	{
		$sql = "INSERT INTO $table SET
		TITLE = '$_POST[title]',
		TANGGAL = '$_POST[tanggal]',
		CONTENT	= '$_POST[content]'";
		$query = mysql_query($sql);
		$sql2 = "SELECT MAX(ID) from $table";
		$result2 = mysql_query($sql2);
		$row2 = mysql_fetch_array($result2);
	
		header("Location: post.php?id=".$row2['MAX(ID)']);
	}
?>