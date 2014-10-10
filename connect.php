<?php
	$con=mysql_connect('localhost','root','');
	
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	mysql_select_db('simpleblog', $con);
	
	
function printDate($tanggal) {
	$rawDate = substr($tanggal, 0, 10);
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
	echo $splitDate[2].' '.$month.' '.$splitDate[0];
}
?>