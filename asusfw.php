<?php 

// helper function - frame work andre susanto

function req_handler($request, $default = ""){
	return  isset ($_REQUEST[$request]) ? mysql_real_escape_string($_REQUEST[$request]) : $default;
}
