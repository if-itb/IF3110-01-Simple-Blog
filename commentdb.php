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
		$email = $row['email'];
		echo "<li class=\"art-list-item\">";
			echo "<div class=\"art-list-item-title-and-time\">";
				echo "<h2 class=\"art-list-title\"><a href=\"mailto:" .$email. "\">" .$nama. "</a></h2>";
				
				$query_now = mysql_query("SELECT NOW() as now");	//Mengambil datetime sekarang
				$row2 = mysql_fetch_assoc($query_now);
				$now = new DateTime($row2['now']);
				$date = new DateTime($tanggal);
				$interval = date_diff($now, $date);
				
				if($interval->y != 0){ //Jika lebih dari sama dengan 1 tahun
					echo "<div class=\"art-list-time\">" .$interval->format('%y years ago'). "</div>";
				}
				else if($interval->m != 0){ //Jika lebih dari sama dengan 1 bulan
					echo "<div class=\"art-list-time\">" .$interval->format('%m months ago'). "</div>";
				}
				else if($interval->d != 0){ //Jika lebih dari sama dengan 1 hari
					echo "<div class=\"art-list-time\">" .$interval->format('%d days ago'). "</div>";
				}
				else if($interval->h != 0){ //Jika lebih dari sama dengan 1 jam
					echo "<div class=\"art-list-time\">" .$interval->format('%H hours ago'). "</div>";
				}
				else if($interval->i != 0){ //Jika lebih dari sama dengan 1 menit
					echo "<div class=\"art-list-time\">" .$interval->format('%i minutes ago'). "</div>";
				}
				else{
					echo "<div class=\"art-list-time\">" .$interval->format('%s seconds ago'). "</div>";
				}
				
			echo "</div>";
			echo "<p>" .$komentar. "</p>";
		echo "</li>";
	}
	mysql_close();
?>