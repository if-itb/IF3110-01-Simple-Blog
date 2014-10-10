<?php

include 'DBConfig.php';

// $timestamp = strtotime($_POST['Tanggal']);
// $date = date('Y-m-d', $timestamp);
if(isset($_POST['simpan']))
{
    $Judul=$_POST['Judul'];
    $Tanggal=$_POST['Tanggal'];
    $Konten=$_POST['Konten'];
    if(empty($Judul) || empty($Tanggal) || empty($Konten))
    {
        if(empty($Judul))
        {
            echo "<font color='red'>Judul harus diisi.</font><br/>";
        }
        if(empty($Tanggal))
        {
            echo "<font color='red'>Tanggal harus diisi.</font><br/>";
        }
        if(empty($Konten))
        {
            echo "<font color='red'>Konten harus diisi.</font><br/>";
        }               
}   
else
{       
    $query = mysql_query("INSERT INTO entries (JUDUL, TANGGAL, KONTEN)
				   VALUES ('$_POST[Judul]','$_POST[Tanggal]','$_POST[Konten]')");
    header('Location: index.php');
}

mysql_close($link);
?>
