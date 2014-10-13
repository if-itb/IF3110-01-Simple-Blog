<?php
	header("location:index.php");
	include 'connection.php';
    $judul = mysqli_real_escape_string($con, $_POST['Judul']);
    $tanggal = mysqli_real_escape_string($con, $_POST['Tanggal']);
    $konten = mysqli_real_escape_string($con, $_POST['Konten']);

    $sql="INSERT INTO postingan (Judul, Tanggal, Konten)
    VALUES ('$judul', '$tanggal', '$konten')";
    if (!mysqli_query($con,$sql)) {
      die('Error: ' . mysqli_error($con));
    }
?>