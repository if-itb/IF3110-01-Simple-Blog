<?php

	if(!mysql_connect("localhost","root",""))
	{
		echo "<h2> Tidak dapat terhubung ke database </h2>";
		die();
	}
	mysql_select_db("simpleblog");