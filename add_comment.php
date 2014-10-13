<?php
    include 'function.php';
    $id         = $_GET['id'];
    $nama       = mysql_real_escape_string ($_POST['Nama']);
    $email      = mysql_real_escape_string ($_POST['Email']);
    $komentar   = mysql_real_escape_string ($_POST['Komentar']);
    $tanggal    = date($_POST["Tanggal"]);
    $location = 'Location: post.php?id='.$id;
    //echo $location;
    //echo $komentar;
    add_comment($id, $nama, $email, $komentar, $tanggal);
    header($location);
?>