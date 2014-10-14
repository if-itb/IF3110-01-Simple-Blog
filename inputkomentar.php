<?php
	include "koneksi.php"; 
	if(isset($_POST)) {
		
			$nama = $_POST['Nama_komen'];
			$email = $_POST['Email'];
			$komentar = $_POST['Komentar'];
			$index_post = $_POST['id'];
		}
	$insert = "INSERT INTO komentar (`Nama`, `Email`, `Komentar`, `id_post`) VALUES ('$nama',
	'$email', '$komentar', '$index_post' ) ";
	$insert_query = mysql_query($insert);
	
	$query = mysql_query("select * from komentar where id_post='$index_post'");
			
			while ($data = mysql_fetch_array($query)){
              echo  '<li class="art-list-item">';
              echo      '<div class="art-list-item-title-and-time">';
              echo          '<h2 class="art-list-title"><a href="post.html">'. $data["Nama"] .'</a></h2>';
              echo          '<div class="art-list-time">2 menit lalu</div>';
              echo      '</div>';
              echo      '<p>'. $data["Komentar"].'</p>';
              echo  '</li>';
}
	
	
	/* if($insert_query){
		header('location:post.php?id='. $index_post .'?message=success');	
	} */
	
?>

