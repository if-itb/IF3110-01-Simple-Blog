<?php
	include 'functions.php';
	if($_GET){
		$PostID = $_GET['ID'];
		$Name = $_GET['Name'];
		$Email = $_GET['Email'];
		$Comment = $_GET['Comment'];
		echo $PostID;
		echo $Name;
		echo $Comment;
		$dbhandle = ConnecttoDatabase();
		$sqlquery = "INSERT INTO Comments (PostID, Nama, Email, Komentar, Tanggal) VALUES ('$PostID', '$Name', '$Email', '$Comment', NOW())";
		mysqli_query($dbhandle, $sqlquery);
		CloseDatabaseConnection($dbhandle);
	}

?>