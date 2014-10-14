<?php
//open connection to db
$db_post = mysqli_connect('localhost','root', "", 'simpleblog');

//get from param
$id = $_GET["id"];
$nama = $_GET["Nama"];
$email = $_GET["Email"];
$komentar = $_GET["Komentar"];
date_default_timezone_set('Asia/Jakarta'); 
$tanggal = date("Y-m-d H:i:s");

$query = "INSERT INTO `simpleblog`.`commentlist` (`idx_post`, `nama`, `email`, `waktu`, `komentar`) VALUES (".$id.",'$nama','$email','$tanggal','$komentar')";

mysqli_query($db_post, $query);	

	
mysqli_close($db_post);	

?>