<?php
	include("connect.php");
	session_start();
	if(isset($_POST['submit'])){
		if(isset($_POST['Judul']) && isset($_POST['Tanggal']) && isset($_POST['Konten'])){
			$Judul = htmlspecialchars($_POST['Judul']);
			$Tanggal = htmlspecialchars($_POST['Tanggal']);
			$Konten = htmlspecialchars($_POST['Konten']);

			if(($Judul != "") && ($Tanggal != "") && ($Konten != "")){
				mysql_query("
					INSERT INTO post(Judul,Tanggal,Konten) 
					VALUES('$Judul','$Tanggal','$Konten')
				") or die(mysql_error());
				mysql_close($connection);
				session_destroy();
				header("location:index.php");
			}
		}
	}
?>

