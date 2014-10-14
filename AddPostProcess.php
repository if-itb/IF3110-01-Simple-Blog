<?php
include 'connect.php';

	$mode = $_GET['mode'];
	
	if($mode==1){ //berarti edit post
	echo "ini EDIT POST";
		$judul = $_GET['Judul'];
		$tanggal = $_GET['Tanggal'];
		$isi = $_GET['Konten'];
		$id_post = $_GET['id_post'];
		
		$postQuery = "UPDATE `tucildb_13511097`.`listpost` SET `title`='".$judul."',`date`='".$tanggal."',`post`='".$isi."' WHERE `id`=".$id_post;
		
		mysql_query($postQuery);
		
	}elseif ($mode==2){ // hapus post dengan id tertentu
	echo "INI DELETE POST";
		$id_post = $_GET['id'];
		$postQueryListPost = "DELETE FROM `tucildb_13511097`.`listpost` WHERE `id`=".$id_post;
		$postQueryKomen = "DELETE FROM `tucildb_13511097`.`post-komen` WHERE `id_post`=".$id_post;
		mysql_query($postQueryListPost);
		mysql_query($postQueryKomen);
		
	}else{ // tambah post baru : mode =0
	echo "INI TAMBAH POST";
		$judul = $_GET['Judul'];
		$tanggal = $_GET['Tanggal'];
		$isi = $_GET['Konten'];
		
		$new_id = 0;
	while (1){
		$postQuery= 'SELECT * FROM `tucildb_13511097`.`listpost` WHERE `id`='.$new_id;
				$postResult =  mysql_query($postQuery,$con);
				
				if(mysql_num_rows($postResult)==0) {
					break;
				}else{
					$new_id =$new_id+1;
				}
				
	}
	
	echo $judul;
	
	$regist_query = "INSERT INTO `tucildb_13511097`.`listpost` (`id`,`title`,`date`,`post`) 
					VALUES ( '$new_id',
							'$judul',
							'$tanggal',
							'$isi')";
		$regist_result = mysql_query($regist_query);
		
		if(!$regist_result){
			echo 'Unable to Edit Database';
			die(mysql_error()); // TODO: better error handling
		}
	}
	mysql_close($con);
	header('location:index.php');
	
?>