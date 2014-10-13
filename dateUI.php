<?php

function dateDBToText($date) {
	$d = explode("-", $date);
	return $d[2] . " " . monthConversion($d[1]) . " " . $d[0];
}

function dateDDMMYYYYToDB($date) {
	$d = explode("/", $date);
	return $d[2] . "-" . $d[1] . "-" . $d[0];
}

function dateDBToDDMMYYYY($date) {
	$d = explode("-", $date);
	return $d[2] . "/" . $d[1] . "/" . $d[0];
}

function monthConversion($month) {
	switch($month) {
		case 1: return "January";
		case 2: return "February";
		case 3: return "March";
		case 4: return "April";
		case 5: return "May";
		case 6: return "June";
		case 7: return "July";
		case 8: return "August";
		case 9: return "September";
		case 10: return "October";
		case 11: return "November";
		case 12: return "December";
		default: break;
	}
}

function timeAgo($time) {
	$time = time() - strtotime($time);

	$tokens = array (
		31536000 => 'year',
		2592000 => 'month',
		604800 => 'week',
		86400 => 'day',
		3600 => 'hour',
		60 => 'minute',
		1 => 'second'
	);

	foreach ($tokens as $unit => $text) {
		if ($time < $unit) continue;
		$numberOfUnits = floor($time / $unit);
		return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'')." ago";
	}

}

?>
