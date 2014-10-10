<?php
function printTanggal($date) {
	$splittedDate = explode("-", $date);
	$num_month = $splittedDate[1];
	$date = $splittedDate[2];
	$year = $splittedDate[0];

	switch ($num_month) {
				case "01": 
						$month = "Januari";
						break;
				case "02": 
						$month = "Februari"; 
						break;
				case "03": 
						$month = "Maret"; 
						break;
				case "04": 
						$month = "April"; 
						break;
				case "05": 
						$month = "Mei"; 
						break;
				case "06": 
						$month = "Juni"; 
						break;
				case "07": 
						$month = "Juli"; 
						break;
				case "08": 
						$month = "Agustus"; 
						break;
				case "09": 
						$month = "September"; 
						break;
				case "10": 
						$month = "Oktober"; 
						break;
				case "11": 
						$month = "November"; 
						break;
				case "12": 
						$month = "Desember"; 
						break;
				default: break;
	}

	return $date." ".$month." ".$year;  
}

?> 