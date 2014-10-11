<?php
    $post_id = uniqid();
    $con=mysqli_connect("localhost","root","","wbd_db");
    $tittle = mysqli_real_escape_string($con, $_POST['Judul']);
    $post_date = mysqli_real_escape_string($con, $_POST['Tanggal']);
    $konten = mysqli_real_escape_string($con, $_POST['Konten']);
    if($tittle != null && $post_date != null && $konten != null){
        $sql="INSERT INTO post (post_id, tittle, post_date, konten)
        VALUES ('$post_id', '$tittle', '$post_date', '$konten')";
        if (!mysqli_query($con,$sql)) {
          die('Error: ' . mysqli_error($con));
        }
    }
    mysqli_close($con);
    if($tittle == null || $post_date == null || $konten == null){
        echo "Judul, Tanggal, atau Konten tidak boleh kosong.";
    }
    header('Location: index.php');
?>