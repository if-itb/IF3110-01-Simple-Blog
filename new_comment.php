<?php
    $comment_id = uniqid();
    $con=mysqli_connect("localhost","root","","wbd_db");
    $nama = mysqli_real_escape_string($con, $_POST['Nama']);
    $post_id = mysqli_real_escape_string($con, $_POST['post_id']);
    $comment_date = mysqli_real_escape_string($con, $_POST['comment_date']);
    $komentar = mysqli_real_escape_string($con, $_POST['Komentar']);
    $email = mysqli_real_escape_string($con, $_POST['Email']);
    $sql="INSERT INTO `comment` (`post_id`, `comment_id`, `email`, `nama`, `komentar`, `comment_date`) VALUES ('$post_id','$comment_id','$email','$nama','$komentar','$comment_date')";
    if (!mysqli_query($con,$sql)) {
      die('Error: ' . mysqli_error($con));
    }
    mysqli_close($con);
    if($tittle == null || $post_date == null || $konten == null){
        echo "Judul, Tanggal, atau Konten tidak boleh kosong.";
    }
    header("Location: post.php?pc=$post_id");
?>