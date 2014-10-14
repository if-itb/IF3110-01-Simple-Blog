<?php

// preventing sql_injection by checking the string
function mysql_safe_string($value) 
{
	$value = trim($value);
	if (empty($value)) 
		return 'NULL';
	else if (is_numeric($value))
		return $value;
	else
		return "'".mysql_real_escape_string($value)."'";
}

function mysql_safe_query($query)
{
	$args = array_slice(func_get_args(),1);
	$args = array_map('mysql_safe_string',$args);
	return mysql_query(vsprintf($query,$args));
}

function redirect($uri)
{
	header('location:'.$uri);
	exit;
}

$db = mysql_connect("localhost","root","secret");
if (!$db) 
{
	die ('Could not connect: '.mysql_error());
};

if (!mysql_select_db("simpleblog", $db)) 
{
	die ('Connection to database failed.');
};

?>