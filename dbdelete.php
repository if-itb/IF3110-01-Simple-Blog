<?php
	include "mysql.php";
	$table = "ENTRIES";
	
	$sql = "DELETE FROM $table 
		WHERE ID=$_GET[id]";
	
	$query = @mysql_query($sql);

	include "index.php";
?>