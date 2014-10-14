<?php

require 'database.php';
$pid = null;
if (!empty($_GET['pid'])){
	$pid = $_REQUEST['pid'];
}

	$name = $_GET['Nama'];
	$email = $_GET['Email'];
	$comment = $_GET['Komentar'];

	

	$cdate = date("Y-m-d H:i:s");


		$sambung = mysql_connect("localhost:3306","root","");
		if (!$sambung) {
			die('Tidak bisa tersambung: ' . mysql_error());
		}
		mysql_select_db("simpleblog");
		$postKomentar = "INSERT INTO komentar (pid, c_name, c_email, comment, c_date) VALUES ('$pid', '$name','$email','$comment','$cdate')";
		if (!mysql_query($postKomentar,$sambung)){
			die('Error: ' . mysql_error());
		}

		mysql_close($sambung);
		header("Location: getComment.php?pid=$pid");


?>