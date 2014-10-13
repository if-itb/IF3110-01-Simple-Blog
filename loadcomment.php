<?php
	include('connectdb.php');
	$id_post = $_GET['id_post'];
	$query = mysql_query("SELECT * FROM comment WHERE id_post = '$id_post' ORDER BY id_comment DESC") or die(mysql_error());
	while($row = mysql_fetch_assoc($query)){
		$nama = $row['nama'];
		$komentar = $row['komentar'];
		$tanggal = $row['tanggal'];
		$email = $row['email'];
		echo "<li class=\"art-list-item\">";
			echo "<div class=\"art-list-item-title-and-time\">";
				echo "<h2 class=\"art-list-title\"><a href=\"mailto:" .$email. "\">" .$nama. "</a></h2>";
				$now = new DateTime("now");
				$date = new DateTime($tanggal);
				$interval = date_diff($now, $date);
				echo "<div class=\"art-list-time\">" .$interval->format('%a hari yang lalu'). "</div>";
			echo "</div>";
			echo "<p>" .$komentar. "</p>";
		echo "</li>";
	}
	mysql_close();
?>