<?php

require_once '../config.php';

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Slog Admin Page"');
    header('HTTP/1.0 401 Unauthorized');
    die('This page needs administrator authentication.');
} else {
	$input_user = $_SERVER['PHP_AUTH_USER'];
	$input_pass = $_SERVER['PHP_AUTH_PW'];
	if ($admin_user != $input_user || $admin_pass != $input_pass) {
		header('HTTP/1.0 401 Unauthorized');
		die('Wrong password entered.');
	}
}