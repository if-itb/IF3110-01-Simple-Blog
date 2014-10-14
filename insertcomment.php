<?php
	include 'connection.php';
    $id = $_POST['id'];
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $komentar = mysqli_real_escape_string($con, $_POST['komentar']);

    $sql="INSERT INTO komentar (ID, Nama, Email, Komentar)
    VALUES ('$id', '$nama', '$email', '$komentar')";
    if (!mysqli_query($con,$sql)) {
      die('Error: ' . mysqli_error($con));
    }
?>