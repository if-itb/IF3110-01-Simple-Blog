<?php 

// helper function - frame work andre susanto

function req_handler($request, $default = ""){
	return  isset ($request) ? mysql_real_escape_string($request) : $default;
}
