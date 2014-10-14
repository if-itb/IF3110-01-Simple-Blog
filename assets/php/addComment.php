<?php
    //pengaktifan sesi
    session_start();

    //melakukan koneksi kedalam database post dan comment yang telah dibuat
    $connectBlogDatabase = mysqli_connect("localhost", "root", "", "simpleblog");

    //mengecek apakah koneksi berjalan dengan baik, jika tidak, menampilkan pesan error
    if(mysqli_connect_errno()) {
        echo "Gagal Koneksi : ".mysqli_connect_error();   
    }

    //mengambil nilai index
    $index = $_GET['index'];

    //mengambil data dari form
    $namaForm      = mysqli_real_escape_string($connectBlogDatabase, $_GET['nama']);
    $emailForm    = mysqli_real_escape_string($connectBlogDatabase, $_GET['email']);
    $komentarForm     = mysqli_real_escape_string($connectBlogDatabase, $_GET['konten']);

    //mengambil waktu sekarang
    $date = date('Y-m-d H:i:s');

    //membentuk dan menjalankan query
    $queryAdd = "INSERT INTO commentdata (Nama, Tanggal, Konten, Email, ID) VALUES ('$namaForm', '$date', '$komentarForm', '$emailForm', '$index')";
    mysqli_query($connectBlogDatabase, $queryAdd);

    //memberikan notifikasi
    echo "*Komentar telah ditambahkan";
?>