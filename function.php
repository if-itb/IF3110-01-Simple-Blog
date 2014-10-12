<?php

function dbDatetoCalendar($a)
{
	$dateArray = explode('-', $a);
	$m = intval($dateArray[1]);
	$text = $dateArray[2];
	switch($m)
	{
		case 1:
			$text = $text . " Januari";break;
		case 2:
			$text = $text . " Februari";break;
		case 3:
			$text = $text . " Maret";break;
		case 4:
			$text = $text . " April";break;
		case 5:
			$text = $text . " Mei";break;
		case 6:
			$text = $text . " Juni";break;
		case 7:
			$text = $text . " Juli";break;
		case 8:
			$text = $text . " Agustus";break;
		case 9:
			$text = $text . " September";break;
		case 10:
			$text = $text . " Oktober";break;
		case 11:
			$text = $text . " November";break;
		case 12:
			$text = $text . " Desember";break;
	}
	return $text . " " . $dateArray[0];
}

?>