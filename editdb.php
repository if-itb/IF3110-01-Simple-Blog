<?php
	header("Location:index.php");
	$link=mysqli_connect("localhost","root","","my_db");
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $id = $_GET['var'];
    $judul = mysqli_real_escape_string($link,$_POST["Judul"]);
	$tanggal = mysqli_real_escape_string($link,$_POST["Tanggal"]);
	$konten = mysqli_real_escape_string($link,$_POST["Konten"]);

	$sqlupdate="UPDATE my_db.posting SET JUDUL='$judul', TANGGAL='$tanggal', KONTEN='$konten' WHERE Posting.ID=$id";
	if (!mysqli_query($link,$sqlupdate)) {
		die('Error: ' . mysqli_error($link));
	}
	
	mysqli_close($link);
    exit;
?>