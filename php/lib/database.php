<?php

require_once dirname(__DIR__) . "/config.php";

function db_connect() {
	global
		$db_host,
		$db_user,
		$db_pass,
		$db_name;
	$mysqli = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	return $mysqli;
}

function db_query($query, $param) {
	$db = db_connect();
	foreach ($param as $key => $value) {
		$query = str_ireplace("%{$key}%", mysqli_real_escape_string($db, $value), $query);
	}
	$result = mysqli_query($db, $query);
	if (stripos($query, "INSERT") !== false || stripos($query, "UPDATE") !== false) {
		return mysqli_insert_id($db);
	} else {
		return $result;
	}
}