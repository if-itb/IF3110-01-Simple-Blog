<?php

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
	$postId = $_GET['idpost'];

	$connDb = mysqli_connect("localhost", "root", "", "simple_blog");
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}		

	$sqlQuery = "SELECT * FROM `simple_blog`.`komentar` WHERE `id_post`='$postId'";	
	
	$result = mysqli_query($connDb, $sqlQuery);              
	
	$stringBuilder = '';
	while($comment = mysqli_fetch_array($result)) {
		$stringBuilder .= '<li class="art-list-item"><div class="art-list-item-title-and-time"><h2 class="art-list-title"><a href="#">'.$comment['nama'].'</a></h2><div class="art-list-time">'.printReadableDateFormat($comment['tanggal']).'</div></div><p>'.$comment['isi_komentar'].'</p></li>';
	}

	mysqli_close($connDb);

	echo $stringBuilder;	
?>