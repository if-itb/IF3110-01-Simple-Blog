<?php
    $session_post_id = $_POST['post_id'];
    $con=mysqli_connect("localhost","root","","wbd_db");
    $tittle = mysqli_real_escape_string($con, $_POST['Judul']);
    $post_date = mysqli_real_escape_string($con, $_POST['Tanggal']);
    $konten = mysqli_real_escape_string($con, $_POST['Konten']);
    if($tittle != null && $post_date != null && $konten != null){
        $sql="UPDATE `post` set `tittle` = '$tittle', `post_date` = '$post_date', `konten` = '$konten' WHERE `post_id` = '$session_post_id'";
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