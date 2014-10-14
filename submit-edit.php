<?php
require("connect_database.php");
$judul = $_POST["Judul"];
$tanggal =$_POST["Tanggal"];
$konten = $_POST["Konten"];
$id2 = $_REQUEST["id"];
mysqli_query($con, "UPDATE post SET judul='$judul', tanggal='$tanggal', konten='$konten'
			WHERE id='$id2'");
header("location:index.php");

?>