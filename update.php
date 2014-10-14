<?php
	include("connect.php");
	
	if (isset($_POST['submit'])){
		if (isset($_POST['Judul']) && isset($_POST['Tanggal']) && isset($_POST['Konten'])){
			session_start();
			$ID = $_SESSION["ID"];
			$Judul = htmlspecialchars($_POST['Judul']);
			$Tanggal = htmlspecialchars($_POST['Tanggal']);
			$Konten = htmlspecialchars($_POST['Konten']);
		}
			if (($Judul!="")&&($Tanggal!="")&&($Konten!="")){
				mysql_query("
					UPDATE post
					SET Judul = '$Judul', Tanggal = '$Tanggal', Konten = '$Konten'
					WHERE ID = '$ID'
					
				")or die(mysql_error());
				mysql_close($connection);
				session_destroy();
				header('location:index.php');
			}
			else{
				//mysql_close($connection);
			}
	}
?>