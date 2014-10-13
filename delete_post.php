<?php
	require_once(dirname(__FILE__).'/db_controller.php');
	
	$db = new DB();
	if (isset($_GET["id"])) {
		$id = $_GET["id"];
		$db->removePost($id);
	}
	header("location: index.php");
?>
