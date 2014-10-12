<?php 
	include '../template/dbconnect.php';

	$email = $_GET['email'];
	$nama = $_GET['nama'];
	$komentar = $_GET['komentar'];
	$id_post = $_GET['id_post'];
	$date = date("Y-m-d");
	
	$query = "INSERT INTO komentar (nama,email,komen,tanggal) VALUES ('$nama','$email','$komentar','$date')";
	$result = mysql_query($query);
	if(!$query){
		echo 'Query can\'t be processed';
	}

	$id_komentar = mysql_insert_id();
	
	$query = "SELECT komentar FROM posting WHERE id='$id_post'";
	$result = mysql_query($query);
	if(!$result){
		echo "Query can't be processed";
	}
	while($row=mysql_fetch_row($result)){
		$curr_id_komentar = $row[0];
	}

	$curr_id_komentar .= $id_komentar .',';

	$query = "UPDATE posting SET komentar='$curr_id_komentar' WHERE id='$id_post'";
	$result = mysql_query($query);
	if(!$result){
		echo "Query can't be processed";
	}

	echo '<div class="art-list-item-title-and-time">';
    echo 	'<h2 class="art-list-title">'.$nama.'</h2>';
    echo 	'<div class="art-list-time">'.$date.'</div>';
    echo '</div>';
    echo '<p>'.$komentar.'</p>';
?>