
<?php
//------------------------do_new_post.php-------------------
include "../config/configuration.php";

function check_input($value)
{
	return addslashes($value);
}

$judul =  check_input($_POST['judul']);
$tanggal =  check_input($_POST['tanggal']);
$your_date = date("Y-m-d", strtotime($tanggal));
$konten =  check_input($_POST['konten']);

if($judul=="" OR $tanggal=="" OR $konten==""){
    header("Location:../new_post.php?msg= Semua field harus diisi");
    
}
else {

	$data = mysql_query("INSERT INTO `post`(`judul`,  `tanggal`,  `konten`) VALUES
                                       ('".$judul."', '".$your_date."', '".$konten."')");
	if($data){
		header("Location:../new_post.php?msg=Post Berhasil Ditambahkan");
    } else {      
      	header("Location:../new_post.php?msg=Post Gagal Ditambahkan"); 
    }
}
?>