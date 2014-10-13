<?php
	include 'functions.php';
	$nama = $_GET['nama'];
	$email = $_GET['email'];
	$komentar = $_GET['komentar'];
	$id_post = $_GET['id'];
	$con = connectdb();
	$sql_statement = "INSERT INTO `data_komen`(`Nama`,`Tanggal`,`Email`,`Komentar`,`ID_Post`) VALUES ('$nama',NOW(),'$email','$komentar','$id_post')";
	$Success = mysql_query($sql_statement,$con);
	$sql_statement = "SELECT * FROM data_komen ORDER BY Tanggal";
	$result = mysql_query($sql_statement,$con);
	echo "<ul class='art-list-body'>";
	while($row = mysql_fetch_array($result))
	{
		$nama = $row['Nama'];
		$tanggal = $row['Tanggal'];
		$komentar = $row['Komentar'];
		echo
		"<li class='art-list-item'>"
                    ."<div class='art-list-item-title-and-time'>"
                        ."<h2 class='art-list-title'>".$nama."</h2>"
                        ."<div class='art-list-time'>".$tanggal."</div>"
                    ."</div>"
                    ."<p>".$komentar."</p>"
                ."</li>";
	}
	echo "</ul>";
	mysql_close($con);
?>