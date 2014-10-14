<?php

if (isset($_GET['nama']) && isset($_GET['email']) && isset($_GET['konten'])) {
	$host     = "localhost";
	$username = "root";
	$password = "";
	$dbname   = "if3110-01";

	$id_post = $_GET['id_post'];
	$nama = $_GET['nama'];
	$email = $_GET['email'];
	$waktu = date('Y-m-d H:i:s');
	$konten = $_GET['konten'];
	$conection = mysqli_connect($host,$username,$password,$dbname);
	$query = "INSERT INTO komentar (`id_post`,`nama`,`email`,`waktu`,`konten`) Values ('$id_post','$nama','$email','$waktu','$konten')";
	if (!mysqli_query($conection,$query)) {
		echo "{status:error}";
	}else{
		echo "{status:ok}";
	}
}
?>