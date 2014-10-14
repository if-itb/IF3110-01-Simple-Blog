<?php
include 'connect.php';
	$new_id = 0;
	while (1){
		$postQuery= 'SELECT * FROM `tucildb_13511097`.`post-komen` WHERE `myID`='.$new_id;
				$postResult =  mysql_query($postQuery,$con);
				
				if(mysql_num_rows($postResult)==0) {
					break;
				}else{
					$new_id =$new_id+1;
				}
				
	}
	date_default_timezone_set("Asia/Jakarta");
	
	$nama = $_REQUEST['Nama'];
	$email = $_REQUEST['Email'];
	$isi = $_REQUEST['Komentar'];
	$id_post = $_REQUEST['id_post'];
	$tanggal = date('Y-m-d H:i:s');
	
	$regist_query = "INSERT INTO `tucildb_13511097`.`post-komen`(`myID`, `id_post`, `nama`, `email`, `tanggal`, `isi`)
					VALUES ( '$new_id',
							'$id_post',
							'$nama',
							'$email',
							'$tanggal',
							'$isi')";
		$regist_result = mysql_query($regist_query);
		
		if(!$regist_result){
			echo 'Unable to Edit Database';
		}
		else{
			echo '';
		}
?>