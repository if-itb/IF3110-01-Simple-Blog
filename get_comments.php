<?php
include "mysql.php";

$tempID = $_GET['post_ID'];

$result = mysql_query("SELECT * FROM `comment` WHERE `post_ID` = '$tempID' ORDER BY `comm_DT` ASC") or die(mysql_error());
if (mysql_num_rows($result) > 0){
	while ($row = mysql_fetch_array($result)){
		echo "<li class=\"art-list-item\">";
		echo "<div class=\"art-list-item-title-and-time\">";
		echo	"<h2 class=\"art-list-title\">";
		// link to mail + comment author name done
		echo 	"<a href=\"mailto:$row[comm_email]\">$row[author]</a></h2>";
		// time
		echo	"<div class=\"art-list-time\">$row[comm_DT]</div>";
		echo "</div>";
		echo "<p>$row[comm_Body]";
		// insert body here
		echo "</li>";
	}
}
else {
	echo "No Comments";
}
mysql_close();
?>