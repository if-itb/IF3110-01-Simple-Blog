<?php
//------------------------do_edit_post.php-------------------
include "../config/configuration.php";

$user_option = $_GET["user_option"];
$id = $_GET["id"];
// echo mysql_error($dbConnect);
// echo $id;
if ($user_option=='edit'){
	function check_input($value)
	{
		return addslashes($value);
	}
	
	$judul =  check_input($_POST['judul']);
	$tanggal =  check_input($_POST['tanggal']);
	$your_date = date("Y-m-d", strtotime($tanggal));
	$konten =  check_input($_POST['konten']);

	if($judul=="" OR $tanggal=="" OR $konten==""){
    	header("Location:../edit_post.php?msg=Semua field harus diisi&id=$id");
	} else {
			$data = mysql_query("UPDATE `post` SET `judul`='".$judul."',`tanggal`='".$your_date."',`konten`='".$konten."' WHERE `id`='$id'");
			if($data){
				header("Location:../edit_post.php?msg=Post ini Berhasil Diupdate&id=$id");
			} else {			
				header("Location:../edit_post.php?msg=Post ini Type Gagal Diupdate");	
			}
	}		  
} else {
		$id = $_GET["id"];
		$data = mysql_query("DELETE FROM `post` WHERE `id`='$id'");
		if($data){
			header("Location:../index.php?msg=Data ATM Type Berhasil Dihapus");
		} else {			
			header("Location:../index.php?msg=Data ATM Type Gagal Dihapus");	
		}
}

?>