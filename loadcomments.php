<?php
	include 'functions.php';
	if($_GET){
		$PostID = $_GET["ID"];
		$dbhandle = ConnecttoDatabase();
		$sqlquery = "SELECT * FROM Comments WHERE PostID='$PostID'";
		$result = mysqli_query($dbhandle, $sqlquery);
		while($row = mysqli_fetch_array($result)){
			$Nama = $row['Nama'];
			$Tanggal = $row['Tanggal'];
			$Komentar = $row['Komentar'];
			echo "<li class=\"art-list-item\">
				<div class=\"art-list-item-title-and-time\">
					<h2 class=\"art-list-title\">$Nama</h2>
					<div class=\"art-list-time\">$Tanggal</div>
				</div>
				<p>
					$Komentar
				</p>
			</li>";
		}
		CloseDatabaseConnection($dbhandle);
	}
?>