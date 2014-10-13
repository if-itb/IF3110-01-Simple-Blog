<?php
  header("Location: index.php");	 
  require ('sql_connect.inc');
  sql_connect('blog');

  mysql_query("INSERT INTO blog(judul, tanggal, isi) VALUES ('".$_POST['Judul']."', '".$_POST['Tanggal']."', '".$_POST['Konten']."')");
?>