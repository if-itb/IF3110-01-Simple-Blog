<?php
// iclude functions.php
include 'functions.php';

// operasi
if ($_GET['action']=="edit" || $_GET['action']=="add"){
// mengedit atau menambahkan post
	$title = $_POST['Judul'];
	$date = $_POST['Tanggal'];
	$content = $_POST['Konten'];
	$featured = "FALSE";
	if(isset($_POST['Featured']))
		$featured = "TRUE";
	echo $featured;
	connect_db();
	$row;
	if($_GET['action']=="add"){ // menambahkan post
		$insertQuery = "INSERT INTO sb_posts (judul, tanggal, konten, featured) VALUES ('" .
			$title . "', '" . $date . "', '" . $content . "', " . $featured . ")";
		$row = run_query($insertQuery);
	}
	else{ // mengedit post yang ada
		$pid = $_POST['pid'];
		$updateQuery = "UPDATE sb_posts SET judul = '" .
			$title . "', tanggal = '" . $date . "', konten = '" . $content . "', featured = " . $featured . " WHERE id_post=" . $pid;
		$row = run_query($updateQuery);
	}
	if($row != false){
		echo ' berhasil';
	}
	else{
		echo ' gagal';
	}
	disconnect_db();
	header('Location: index.php');
	die();	
	
}

else if($_GET['action']=="delete"){
// menghapus post
	connect_db();
	$query = "DELETE FROM sb_posts WHERE id_post=".$_GET['pid'];
	if(run_query($query)){
		echo 'post berhasil dihapus';
	}
	else {
		echo 'query salah, post gagal dihapus';
	}
	disconnect_db();
	header('Location: index.php');
	die();
}
else {
	echo 'tidak ada variable yang diset';
}

?>
