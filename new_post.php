<?php
    include 'function.php';

    # Catch post
    $judul = mysql_real_escape_string($_POST["Judul"]);
    $tanggal = date($_POST["Tanggal"]);
    $konten = mysql_real_escape_string($_POST["Konten"]);
    New_Post($judul, $tanggal, $konten);

    # Redirect to home
    header('Location: index.php');
?>