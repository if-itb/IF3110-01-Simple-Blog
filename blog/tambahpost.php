<?php 
  if( $_POST["Judul"] && $_POST["Tanggal"] && $_POST["Konten"] )
  {
     echo "Welcome ". $_POST['Judul']. "<br />";
     echo "You are ". $_POST['Tanggal']. " years old.";
     echo "Thx ".$_POST['Konten']."yeah";
     exit();
  }
  else{
  	echo "isi lengkap postingnya";
  	header('Location: ../new_post.php');
  }
?>