<?php
	include("connect_db.php");
	$id_post = $_GET['id'];
	$query_komentar = mysql_query("
			SELECT * 
			FROM comment
			WHERE id_post = '$id_post' 
			ORDER BY id DESC
		") or die("Gagal meng-load komentar");

	while($row = mysql_fetch_object($query_komentar)){
		$id_post = $row->id_post;
		$Nama = $row->Nama;
		$Email = $row->Email;
		$Tanggal = $row->Tanggal;
		$Komentar = $row->Komentar;
		echo "<li class=\"art-list-item\">";
			echo "<div class=\"art-list-item-title-and-time\">";
				echo "<h2 class=\"art-list-title\"><a href=\"mailto:$Email\">$Nama</a></h2>";
				echo "<div class=\"art-list-time\">$Tanggal</div>";
			echo "</div>";
			echo "<p>$Komentar</p>";
		echo "</li>";
	}
?>
