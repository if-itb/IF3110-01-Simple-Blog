<?php

	include "db.php";
	
	if(@$_POST['id']!="")
	{
		$id=mysql_real_escape_string($_POST['id']);
		mysql_query("DELETE FROM blog WHERE id=".$id);
		
		echo "Blog post $id has been deleted. <br />";
		// di sini, tempatkan kode untuk redirect ke halaman utama...
		header("Location: http://localhost/simpleblog/index.php");
		die();
	}