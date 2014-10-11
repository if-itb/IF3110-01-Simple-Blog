<?php
	include "koneksi.php";
	if(isset($_POST)) {
		if(isset($_POST["Nama"])){
			$nama = $_POST['Nama'];
		}
		if(isset($_POST["Email"])){
			$email = $_POST['Email'];
		}
		if(isset($_POST["Komentar"])){
			$komentar = $_POST['Komentar'];
		}
	}
	$insert = "INSERT INTO komentar (Nama, Email, Komentar) VALUES ('$nama',
	'$email', '$komentar')";
	$insert_query = mysql_query($insert);
	if($insert_query){
		header('location:post.php?message=success');
	} 
?>

