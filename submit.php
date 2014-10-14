<?php
    // post_add.php
    if(!empty($_POST)) {
    include 'mysql.php';
    if(mysql_safe_query('INSERT INTO post (title,date,content) VALUES (%s,%s,%s)', $_POST['Judul'], $_POST['Tanggal'], $_POST['Konten']))
    echo '<script type="text/javascript"> alert("Post submitted.");</script>';
    else
    echo mysql_error();
    }
?>