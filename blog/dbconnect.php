<?php 
	session_start();
	$server = 'localhost';
	$db_username = 'root';
	$db_password = '';
	$db_name = 'blog';
	$con = mysql_connect($server,$db_username,$db_password);

		if(!$con){
			die('Could not connect mySQL database');
		}

		if(!mysql_select_db($db_name)){
			die('Could not connect database');
		}

	$_SESSION['db_name'] = $db_name;
	$_SESSION['con'] = $con;
?>