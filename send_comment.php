<?php	
	$nama = sanitize($_POST['nama']);
	$email = $_POST['email'];
	$komentar = sanitize($_POST['komentar']);
	$idPost = $_POST['idpost'];
	$rawDate = new DateTime();
	$tanggal = $rawDate->format('Y-m-d H:i:s');	

	$connDb = mysqli_connect("localhost", "root", "", "simple_blog");
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$sqlQuery = "INSERT INTO `simple_blog`.`komentar` (nama, email, tanggal, isi_komentar, id_post) VALUES ('$nama', '$email', '$tanggal', '$komentar', '$idPost')";

	if (!mysqli_query($connDb, $sqlQuery)) {
		die('Error: ' . mysqli_error($connDb));
	}

	mysqli_close($connDb);
	$stringBuilder = '';
	$stringBuilder .= '<li class="art-list-item"><div class="art-list-item-title-and-time"><h2 class="art-list-title"><a href="#">'.$nama.'</a></h2><div class="art-list-time">'.printReadableDateFormat($tanggal).'</div></div><p>'.$komentar.'</p></li>';

	echo $stringBuilder;

	function sanitize($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function printReadableDateFormat($tanggal) {
		$date = explode(" ", $tanggal);
		$rawDate = $date[0];
		$rawTime = $date[1];
		$splitTime = explode(":", $rawTime);
		$splitDate = explode("-", $rawDate);
		switch ($splitDate[1]) {
			case 1: $month = 'Januari'; break;
			case 2: $month = 'Februari'; break;
			case 3: $month = 'Maret'; break;
			case 4: $month = 'April'; break;
			case 5: $month = 'Mei'; break;
			case 6: $month = 'Juni'; break;
			case 7: $month = 'Juli'; break;
			case 8: $month = 'Agustus'; break;
			case 9: $month = 'September'; break;
			case 10: $month = 'Oktober'; break;
			case 11: $month = 'November'; break;
			case 112: $month = 'Desember'; break;
			default: break;
		}
		return $splitDate[2].' '.$month.' '.$splitDate[0].' '.$splitTime[0].':'.$splitTime[1];
	}
?>