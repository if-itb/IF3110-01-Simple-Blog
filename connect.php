<?php
	$con=mysql_connect("localhost","root","");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	//echo"terhubung";
	mysql_select_db("simpleblog", $con);
?>