<?php
	header("location:index.php");
	include 'connection.php';
	$id = $_GET['var'];
    $judul = mysqli_real_escape_string($con, $_POST['Judul']);
    $tanggal = mysqli_real_escape_string($con, $_POST['Tanggal']);
    $konten = mysqli_real_escape_string($con, $_POST['Konten']);


    $sql="UPDATE postingan SET Judul='$judul', Tanggal='$tanggal', Konten='$konten' WHERE ID=$id";
    if (!mysqli_query($con,$sql)) {
      die('Error: ' . mysqli_error($con));
    }
?>