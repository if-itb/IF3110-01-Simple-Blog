<?php 
  include '../template/dbconnect.php';

  $id = $_GET['ID'];
  if( $_GET["Judul"] && $_GET["Tanggal"])
  {
  	$judul = mysql_real_escape_string($_GET["Judul"]);
  	$tanggal = mysql_real_escape_string($_GET["Tanggal"]);
  	$konten = mysql_real_escape_string($_GET["Konten"]);
  	$query = "UPDATE posting SET judul='$judul',tanggal='$tanggal',konten='$konten' WHERE id='$id'";
  	if(!mysql_query($query)){
  		echo 'blablabla';
  	}
    header('Location: /if3110-01-simple-blog/index.php');
  }
  else{
  	echo "isi lengkap postingnya";
  	header('Location: /if3110-01-simple-blog/view/form_post.php');
  }
?>