<?php
require 'database.php';

if (!empty($_POST)){
	$titleerror = null;
	$dateerror = null;
	$contenterror = null;

	$title = $_POST['Judul'];
	$date = $_POST['Tanggal'];
	$content = $_POST['Konten'];
	$valid = true;
	if (empty($title)){
		$titleerror = "Judul harus diisi!";
		echo $titleerror;
		$valid = false;
	}
	if (empty($date)){
		$dateerror = "Tanggal harus diisi!"; 
		echo $dateerror;
		$valid = false;
	}
	if (empty($content)){
		$contenterror = "Konten harus diisi!"; 
		echo $contenterror;
		$valid = false;
	}

	


	if ($valid){
		$sambung = mysql_connect("localhost:3306","root","");
		if (!$sambung) {
			die('Tidak bisa tersambung: ' . mysql_error());
		}
		mysql_select_db("simpleblog");
		$post = "INSERT INTO blogitem (posttitle, postdate, postcontent) VALUES ('$_POST[Judul]','$_POST[Tanggal]','$_POST[Konten]')";
		if (!mysql_query($post,$sambung)){
			die('Error: ' . mysql_error());
		}

		mysql_close($sambung);
		header("Location: index.php");
		}
}


?>
