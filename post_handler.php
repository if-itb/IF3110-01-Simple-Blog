<?php
	$judul = $_POST["Judul"];
	$tanggal = $_POST["Tanggal"];
	$konten = $_POST["Konten"];
	$action = $_GET["action"];
	$pid = $_GET["pid"];
	mysql_connect("localhost","root","");
	@mysql_select_db("simpleblog") or die( "Unable to select database");
	if($action=="new"){
		$query = "INSERT INTO post (judul,tanggal,konten) Values (\"".$judul."\",\"".$tanggal."\",\"".$konten."\");";
	}
	else if ($action=="edit"){
		$query = 'UPDATE post SET judul="'.$judul.'",tanggal="'.$tanggal.'",konten="'.$konten.'" WHERE idpost='.$pid;
	}
	mysql_query($query);
	header("Location: index.php");
?>