<?php
	include ("connect.php");
			$idpost=$_GET['id'];
			$listkomen = mysql_query("SELECT * FROM `komentar_post` WHERE (`id`='$idpost' AND `nama` IS NOT NULL) ORDER BY `tanggal_kom` DESC");
			
			while($comment = mysql_fetch_array($listkomen))
			{
				echo '<li class="art-list-item">';
				echo 	'<div class="art-list-item-title-and-time">';
				echo		'<h2 class="art-list-title"><a href="#">'.$comment['nama'].'</a></h2>';
				echo		'<div class="art-list-time">';
				printwaktu($comment['tanggal_kom']);
				echo '</div>';
				echo	'</div>';
				echo	'<p>'.$comment['komentar'].'</p>';
				//'.printwaktu($comment['tanggal_kom']).'
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

/* 	$detik= ($splitTime[0]*60) + ($splitTime[1]*60) + $splitTime[2];
	$cur = new DateTime();
	$curTime = $cur->format('Y-m-d H:i:s');
	$raw1 = explode(" ",$curTime);
	$rawdate1 = $raw1[0];
	$rawtime1 = $raw1[1];
	$splitDate1 = explode("-", $rawdate1);
	$splitTime1 = explode(":", $rawtime1);
	
	$detik1= ($splitTime1[0]*60) + ($splitTime1[1]*60) + $splitTime1[2];
	if ($splitTime1[2]>$splitTime[2])
	{
	if ($splitDate1[2]>$splitDate[2]){
		$sel=$splitDate1[2]-$splitDate[2];
		if($sel>=8){
			echo $splitDate[2].' '.$month.' '.$splitDate[0];
		}else if($sel==7){
			echo '1 minggu lalu';
		}else if($sel>1 && $sel<7){
			echo $sel.'hari lalu';
		}else if($sel==1)
		{
			echo 'kemarin';
		}
	}else{
		$selT=$detik1-$detik;
		if($selT<60)
		{
			echo $selT.'detik lalu';
		}else if($selT>=60)
		{
			$mod=$selT%60;
			if ($mod<60)
			{
				echo $mod.'menit lalu';
			}else{
				$mod1=$mod%60;
				echo $mod1.'jam lalu';
			}
		}
		
	}
	}else{
	echo $splitDate[2].' '.$month.' '.$splitDate[0];
	} */
}
?>