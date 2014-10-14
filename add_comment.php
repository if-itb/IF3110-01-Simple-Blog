<?php
    include 'function.php';
    $id         = $_POST['id'];
    //$id         = $_GET['id'];
    $nama       = mysql_real_escape_string ($_POST['nama']);
    $email      = mysql_real_escape_string ($_POST['email']);
    $komentar   = mysql_real_escape_string ($_POST['komentar']);
    echo $id. $nama. $email. $komentar;
    //$location = 'Location: post.php?id='.$id;
    add_comment($id, $nama, $email, $komentar);
    //header($location);
?>