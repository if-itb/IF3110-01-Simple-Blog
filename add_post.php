<?php
    include 'mysql.php';
    date_default_timezone_set('Asia/Jakarta');
    
    if (!empty($_POST)){
        if (!mysql_safe_query('INSERT INTO post(Title,Date,Content) VALUES (%s,%s,%s)', $_POST['Judul'],$_POST['Tanggal'],$_POST['Konten'])){
            echo mysql_error();
        }
        else{
            redirect("index.php");
        }
    }
?>