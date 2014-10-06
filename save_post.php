<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$judul = sanitize($_POST["Judul"]);
		$rawDate = new DateTime($_POST["Tanggal"]);
		$tanggal = $rawDate->format('Y-m-d H:i:s');
		$konten = sanitize($_POST["Konten"]);  		

		$connDb = mysqli_connect("localhost", "root", "", "simple_blog");
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}		

		if (!isset($_POST["EditMode"])) {			
			$sqlQuery = "INSERT INTO `simple_blog`.`post` (judul, tanggal, content) VALUES ('$judul', '$tanggal', '$konten')";
		}
		else {			
			$postId = $_POST["EditMode"];
			$sqlQuery = "UPDATE `simple_blog`.`post` SET `judul`='$judul',`tanggal`='$tanggal',`content`='$konten' WHERE `id_post`='$postId'";
		}
		if (!mysqli_query($connDb, $sqlQuery)) {
			die('Error: ' . mysqli_error($connDb));
		}
		mysqli_close($connDb);

		header('Location: index.php');
		die();
	}

	function sanitize($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>