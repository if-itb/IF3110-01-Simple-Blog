<?php	
	include 'header.php';
	include 'dbconnect.php';

	$nama = mysql_real_escape_string(sanitize($_POST['nama']));
	$email = $_POST['email'];
	$komentar = mysql_real_escape_string(sanitize($_POST['komentar']));
	$idPost = $_POST['idpost'];
	$rawDate = new DateTime();
	$tanggal = $rawDate->format('Y-m-d H:i:s');	

	$sqlQuery = "INSERT INTO `simple_blog`.`komentar` (nama, email, tanggal, isi_komentar, id_post) VALUES ('$nama', '$email', '$tanggal', '$komentar', '$idPost')";

	if (!mysqli_query($connDb, $sqlQuery)) {
		die('Error: ' . mysqli_error($connDb));
	}

	$stringBuilder = '<li class="art-list-item"><div class="art-list-item-title-and-time"><h2 class="art-list-title"><a href="#">'.$nama.'</a></h2><div class="art-list-time">'.printReadableDateFormatWithTime($tanggal).'</div></div><p>'.$komentar.'</p></li>';	

	echo $stringBuilder;

	function sanitize($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}	
?>