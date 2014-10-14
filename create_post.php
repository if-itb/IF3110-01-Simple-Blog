<?php 
	require 'database.php';

	if (!empty($_POST)){

	$judul = $_POST['judul'];
	$tanggal = $_POST['tanggal'];
	$konten = $_POST['konten'];

	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query = "INSERT INTO post (judul,tanggal,konten) values('$judul','$tanggal','$konten')";
	$q = $pdo->prepare($query);
	$q->execute();
    Database::disconnect();
    header("Location: index.php");
	}
?>

	 