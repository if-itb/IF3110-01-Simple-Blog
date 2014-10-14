<?php

function curPageURL() {
    $pageURL = 'http';
    if (isset($_SERVER["HTTPS"])) {
        if($_SERVER["HTTPS"] == "on")
            $pageURL .= "s";
    }
    $pageURL .= "://";

    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

function getTimeString($time, $UTC = true) {
	static $temp;
	if($UTC) {
		$temp = date_default_timezone_get();
		date_default_timezone_set("UTC");
	}

	if(is_string($time)) {
		$time = strtotime($time);
	} else if($time instanceof DateTime) {
		$time = $time->getTimeStamp();
	} else if(is_int($time)) {

	}

	if($UTC) {
		date_default_timezone_set($temp);
	}

	$curTime = time();

	$reminder = $curTime - $time;
	$ret = null;
	if($reminder <= 60) {
		$ret = $reminder." detik yang lalu";
	} else if($reminder <= 3600) {
		$ret = floor($reminder/60)." menit yang lalu";
	} else if($reminder <= 86400) {
		$ret = floor($reminder/3600)." jam yang lalu";
	} else {
		$ret = date("j F Y, H:i", $time);
	}

	return $ret;
}

?>