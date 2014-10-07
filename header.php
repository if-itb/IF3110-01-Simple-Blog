<?php	
	function printReadableDateFormatWithTime($tanggal) {
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
			case 12: $month = 'Desember'; break;
			default: break;
		}
		return $splitDate[2].' '.$month.' '.$splitDate[0].' '.$splitTime[0].':'.$splitTime[1];
	}

	function printReadableDateFormat($tanggal) {
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
			case 12: $month = 'Desember'; break;
			default: break;
		}
		echo $splitDate[2].' '.$month.' '.$splitDate[0];
	}	
?>