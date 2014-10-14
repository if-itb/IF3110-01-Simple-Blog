<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'blog';
$db = new PDO("mysql:host=".$db_host.";port=3306;dbname=".$db_name, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>