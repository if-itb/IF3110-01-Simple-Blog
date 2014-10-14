<?php
    //pengaktifan sesi
    session_start();

    //melakukan koneksi kedalam database post dan comment yang telah dibuat
    $connectBlogDatabase = mysqli_connect("localhost", "root", "", "simpleblog");

    //mengecek apakah koneksi berjalan dengan baik, jika tidak, menampilkan pesan error
    if(mysqli_connect_errno()) {
        echo "Gagal Koneksi : ".mysqli_connect_error();   
    }

    //delete post
    if(isset($_GET["index"])) {        
        $index = $_GET["index"];
        $sqlDeleteData = "DELETE FROM `postdata` WHERE `ID`=$index";
        mysqli_query($connectBlogDatabase, $sqlDeleteData);
    }

    //kembali ke halaman pengisian
    header('Location: ../../index.html');
?>