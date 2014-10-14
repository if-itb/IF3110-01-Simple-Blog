<?php
	include 'functions.php';
	$id_post = intval($_GET['id']);
	$con = connectdb();
	$sql_statement = "SELECT * FROM data_komen ORDER BY Tanggal ASC";
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