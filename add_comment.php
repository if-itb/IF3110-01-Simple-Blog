<?php
    include 'function.php';
    $id         = $_POST['id'];
    $nama       = mysql_real_escape_string ($_POST['nama']);
    $email      = mysql_real_escape_string ($_POST['email']);
    $komentar   = mysql_real_escape_string ($_POST['komentar']);
    add_comment($id, $nama, $email, $komentar);
    
?>