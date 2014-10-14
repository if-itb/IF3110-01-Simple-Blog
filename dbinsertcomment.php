<?php
	include "mysql.php";
	$table = "COMMENT";
	
	$sql = "INSERT INTO $table SET
	KOMENTAR = '$_GET[komentar]',
	TANGGAL = NOW(),
	NAMA = '$_GET[nama]',
	ID_POST = '$_GET[id]',
	EMAIL	= '$_GET[email]'";
	$query = mysql_query($sql);
	$sql2 = "SELECT MAX(ID) from $table";
	$result2 = mysql_query($sql2);
	$row2 = mysql_fetch_array($result2);
	
	$table1 = "COMMENT";
	$sql1 = "SELECT * from $table1 WHERE ID_POST= '$_GET[id]' ORDER BY ID DESC";
	$result1 = mysql_query($sql1);
	echo "<ul id='comments'>";

		while($row1 = mysql_fetch_array($result1))
		{
			echo "<li class='art-list-item'>";
			echo "<div class='art-list-item-title-and-time'>";
			echo "	<h2 class='art-list-title'>"; echo $row1['NAMA']; echo" </h2>";
			echo "	</div>";  
			echo " <p>"; echo $row1['KOMENTAR']; echo "</p>";
			echo " <p>"; echo $row1['TANGGAL']; echo "</p>";
			echo"</li> ";
		}
	echo "</ul>";
	
?>