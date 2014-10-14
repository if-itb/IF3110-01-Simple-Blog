<?php
    //pengaktifan sesi
    session_start();

    //melakukan koneksi kedalam database post dan comment yang telah dibuat
    $connectBlogDatabase = mysqli_connect("localhost", "root", "", "simpleblog");

    //mengecek apakah koneksi berjalan dengan baik, jika tidak, menampilkan pesan error
    if(mysqli_connect_errno()) {
        echo "Gagal Koneksi : ".mysqli_connect_error();   
    }

    //input dari form kedalam variabel php
    $judulForm      = mysqli_real_escape_string($connectBlogDatabase, $_POST['Judul']);
    $tanggalForm    = mysqli_real_escape_string($connectBlogDatabase, $_POST['Tanggal']);
    $kontenForm     = mysqli_real_escape_string($connectBlogDatabase, $_POST['Konten']);

    //edit atau add ?
    if(isset($_SESSION["index"])) {        
        $index = $_SESSION["index"];
        $sqlEditData = "UPDATE `postdata` SET `Judul`='$judulForm', `Tanggal`='$tanggalForm', `Konten`='$kontenForm' WHERE `ID`=$index";
        mysqli_query($connectBlogDatabase, $sqlEditData);
        $_SESSION["addPost"] = 2;
    } else {
        //generate unique ID
        $instanceID = uniqid();        
        
        $sqlInsertData = "INSERT INTO postdata (ID, Judul, Tanggal, Konten) VALUES ('$instanceID', '$judulForm', '$tanggalForm', '$kontenForm')";
        mysqli_query($connectBlogDatabase, $sqlInsertData);
        $_SESSION["addPost"] = 1;
    }

    //kembali ke halaman pengisian
    header('Location: ../../new_post.html');
?>