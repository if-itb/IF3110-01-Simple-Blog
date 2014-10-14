<?php
	include ("connect.php");
			$idpost=$_GET['id'];
			$listkomen = mysql_query("SELECT * FROM `komentar_post` WHERE (`id`='$idpost' AND `nama` IS NOT NULL) ORDER BY `tanggal_kom` DESC");
			
			while($comment = mysql_fetch_array($listkomen))
			{
				echo '<li class="art-list-item">';
				echo 	'<div class="art-list-item-title-and-time">';
				echo		'<h2 class="art-list-title"><a href="#">'.$comment['nama'].'</a></h2>';
				echo		'<div class="art-list-time">'.printwaktu($comment['tanggal_kom']).'</div>';
				echo	'</div>';
				echo	'<p>'.$comment['komentar'].'</p>';
				
			}
			
function printwaktu($tanggal) {
	$raw = explode(" ",$tanggal);
	$rawdate = $raw[0];
	$rawtime = $raw[1];
	$splitDate = explode("-", $rawdate);
	$splitTime = explode(":", $rawtime);
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
		case 12: $month = 'Desember'; break;
		default: break;
	}
	echo $splitDate[2].' '.$month.' '.$splitDate[0].'<br>'.$splitTime[0].':'.$splitTime[1];
}
?>