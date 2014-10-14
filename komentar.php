<?php
require_once "db_config.php";
global $dbHost;
global $dbUsername;
global $dbPassword;
global $dbName;

if (isset($_POST['submit']))
{
	$mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
	if ($mysqli->connect_errno)
	{
		echo "Failed to connect to mysql database " .$mysqli->connect_errno;
		exit(0);
	}

	//Prepare statement
	$statement = $mysqli->prepare("INSERT INTO `komentar`(`id_post`, `nama`, `email`, `tanggal`, `komentar`) VALUES(?, ?, ?, NOW(), ?)");

	//Bind param
	if (!$statement->bind_param("ssss", $_POST["id"], $_POST["nama"], $_POST["email"], $_POST["komentar"]))
	{
		echo "Failed to bind parameter judul: " . $statement->error_no;
		exit(0);
	}

	//Execute
	if(!$statement->execute())
	{
		echo "Failed to execute sql statement";
		exit(0);
	}

	$statement->close();

	$temp['nama']= $_POST['nama'];
	$temp['tanggal'] = date("d-M-Y");
	$temp['komentar'] = $_POST["komentar"];

	echo json_encode($temp);
	
} else if (isset($_GET['id']))
{
	$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

	if ($id)
	{
		$mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
		if ($mysqli->connect_errno)
		{
			echo "Failed to connect to mysql database " .$mysqli->connect_errno;
			exit(0);
		}

		//Prepare statement
		$results = $mysqli->query("SELECT * FROM `komentar` WHERE `id_post`=".$_GET['id']);	

		if (!$results)
		{
			echo "Failed to fetch posts";
			exit(0);
		}

		$mysqli->close();
		$i = 0;
		$temp = array();
		foreach ($results as $result) {
			$temp[$i]["nama"] = $result['nama'];
			$temp[$i]['tanggal'] = date("d-M-Y", strtotime($result['tanggal']));
			$temp[$i]['komentar'] = $result['komentar'];
			$i++;
		}

		echo json_encode($temp);
	}
}
?>