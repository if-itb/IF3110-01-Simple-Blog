<?php

 //create connection
$connect=mysqli_connect("localhost","root", "", "simple_blog");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$ID = $_POST['ID'];
$Nama = $_POST['Nama'];
$Email = $_POST['Email'];
$Komentar = $_POST['Komentar'];



mysqli_query ($connect,"INSERT INTO komentar (ID,Nama, Email, komentar)
			 VALUES ('$ID', '$Nama',  '$Email', '$Komentar') ");


?>