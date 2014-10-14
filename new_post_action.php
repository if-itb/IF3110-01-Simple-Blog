<?php
if(isset($_POST['Judul']) && isset($_POST['Tanggal']) && isset($_POST['Konten'])){
	$host     = "localhost";
	$username = "root";
	$password = "";
	$dbname   = "if3110-01";
	$tgl = explode("-", $_POST['Tanggal']);
	$conection = mysqli_connect($host,$username,$password,$dbname);

	$id_post =  mysqli_real_escape_string($conection,$_POST['id_post']);
	$judul   =  mysqli_real_escape_string($conection,$_POST['Judul']);
	$tanggal =  mysqli_real_escape_string($conection,$tgl[2]."-".$tgl[1]."-".$tgl[0]);
	$konten  =  mysqli_real_escape_string($conection,$_POST['Konten']);

	
	if(isset($_POST['action']) && ($_POST['action']=='new')){
    	$query = "INSERT INTO post (`judul`,`tanggal`,`konten`) Values ('$judul','$tanggal','$konten')";
		// catatan format input tanggal masih dd-mm-yyyy harusnya yyyy-mm-dd
		if (!mysqli_query($conection,$query)) {
			die('Error: ' . mysqli_error($conection));
			header('Location: http://localhost/if3110-01-Simple-blog/');
		}
		mysqli_close($conection);
		header('Location: http://localhost/if3110-01-Simple-blog/');
	}else if((isset($_POST['action'])) && ($_POST['action'] == 'edit')){
		$query = "UPDATE post SET judul='".$judul."', tanggal='".$tanggal."', konten='".$konten."' WHERE id_post=".$id_post;
		if (!mysqli_query($conection,$query)) {
			die('Error: ' . mysqli_error($conection));
			header('Location: http://localhost/if3110-01-Simple-blog/');
		}
		mysqli_close($conection);
		//echo "mode edit syntax sqlnya harus opersai update";
		header('Location: http://localhost/if3110-01-Simple-blog/');
	}
}else{
	// redirect balik ke fil
	header('Location: http://localhost/if3110-01-Simple-blog/new_post.php');
}




?>






