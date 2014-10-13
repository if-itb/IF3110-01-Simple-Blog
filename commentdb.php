<?php
	include('connectdb.php');
	$id_post = $_GET['id_post'];
	$nama = $_GET['nama'];
	$email = $_GET['email'];
	$komentar = $_GET['komentar'];
	$query = mysql_query("insert into comment values ('', '$nama', '$email', '$komentar', NOW(), '$id_post')") or die (mysql_error());
	$query = mysql_query("SELECT * FROM comment WHERE id_post = '$id_post' ORDER BY id_comment DESC") or die(mysql_error());
	while($row = mysql_fetch_assoc($query)){
		$nama = $row['nama'];
		$komentar = $row['komentar'];
		$tanggal = $row['tanggal'];
		echo "<li class=\"art-list-item\">";
			echo "<div class=\"art-list-item-title-and-time\">";
				echo "<h2 class=\"art-list-title\"><a href=\"post.php\">" .$nama. "</a></h2>";
				echo "<div class=\"art-list-time\">" .$tanggal. "</div>";
			echo "</div>";
			echo "<p>" .$komentar. "</p>";
		echo "</li>";
	}
	mysql_close();
?>