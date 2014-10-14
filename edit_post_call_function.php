<?php
    include 'function.php';

    # Catch post
    $id = mysql_real_escape_string($_GET["id"]);
    $judul = mysql_real_escape_string($_POST["Judul"]);
    $tanggal = date($_POST["Tanggal"]);
    $konten = mysql_real_escape_string($_POST["Konten"]);
    Edit_Post($id, $judul, $tanggal, $konten);

    # Redirect to home
    header('Location: index.php');
?>