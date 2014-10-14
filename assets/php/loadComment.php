<?php
   //pengaktifan sesi
    session_start();

    //melakukan koneksi kedalam database post dan comment yang telah dibuat
    $connectBlogDatabase = mysqli_connect("localhost", "root", "", "simpleblog");

    //mengecek apakah koneksi berjalan dengan baik, jika tidak, menampilkan pesan error
    if(mysqli_connect_errno()) {
        echo "Gagal Koneksi : ".mysqli_connect_error();   
    }

    //mengambil index post
    $index = $_GET['index'];

    //menjalankan query
    $queryLoad = "SELECT * FROM commentdata WHERE ID='$index' ORDER BY Tanggal DESC";
    $queryStart = mysqli_query($connectBlogDatabase, $queryLoad);

    //mengambil data hasil query
    $ajaxResult="";
    while ($arrayData = mysqli_fetch_array($queryStart)) {
        $ajaxResult = $ajaxResult."<li class=\"art-list-item\">
             <div class=\"art-list-item-title-and-time\">
                <h2 class=\"art-list-title\">".$arrayData['Nama']."</a></h2>
                <div class=\"art-list-time\">".$arrayData['Tanggal']."</div>
            </div>
            <p>".$arrayData['Konten']."</p>
        </li>";
    }

    //mengembalikan hasil ajax
    echo $ajaxResult;

?>