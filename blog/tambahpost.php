<?php 
  include 'dbconnect.php';
  if( $_POST["Judul"] && $_POST["Tanggal"] && $_POST["Konten"] )
  {
  	$judul = mysql_real_escape_string($_POST["Judul"]);
  	$tanggal = mysql_real_escape_string($_POST["Tanggal"]);
  	$konten = mysql_real_escape_string($_POST["Konten"]);
  	$query = "INSERT INTO posting (judul,tanggal,konten) VALUES ('$judul','$tanggal','$konten')";
  	if(!mysql_query($query)){
  		echo 'blablabla';
  	}
    //header('Location: ../index.php');
  }
  else{
  	echo "isi lengkap postingnya";
  	header('Location: ../new_post.php');
  }
?>