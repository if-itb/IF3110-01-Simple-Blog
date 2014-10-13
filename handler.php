<?php
include_once("assets/php/module/PostDataManager.php");

$data_mgr = new PostDataManager("assets/data", "assets/data");

if(empty($_GET)) {

	$content = str_replace("\r\n", "<p>", $_POST["Konten"]);
	$retval = $data_mgr->make_post($_POST["Judul"], $_POST["Tanggal"], $content);

	if($retval !== false) {
		header("Location: index.php");
	} else {
		print("Gagal membuat post baru!");
	}
	
} else if($_GET["edit"] == "true") {
	
	//print_r($_POST);
	
	$content = str_replace("\r\n", "<p>", $_POST["Konten"]);
	$retval = $data_mgr->edit_post(
		$_POST["oldtitle"],
		$_POST["olddate"],
		$_POST["Judul"], 
		$_POST["Tanggal"], 
		$content);
	
	if($retval !== false) {
		header("Location: index.php");
	} else {
		print("Gagal mengedit post!");
	}
	
}

?>