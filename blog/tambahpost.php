<?php 
  if( $_POST["Judul"] || $_POST["Tanggal"] )
  {
     echo "Welcome ". $_POST['Judul']. "<br />";
     echo "You are ". $_POST['Tanggal']. " years old.";
     exit();
  }
?>