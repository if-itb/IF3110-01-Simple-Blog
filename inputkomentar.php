<?php
include('connectdb.php');
$pid = $_GET['pid'];
$nama = $_GET['nama'];
$email = $_GET['email'];
$komentar = $_GET['komentar'];

$query = mysql_query("insert into komentar (pid,nama,email,komentar) values ('$pid','$nama', '$email', '$komentar')") or die (mysql_error());

echo "<ul class=\"art-list-body\" id=\"ListKomentar\">";
	function DisplayWaktu($waktu){
		$time = time() - strtotime($waktu);
		$seconds = array(
			31536000 => 'year',
			2592000 => 'month',
			604800 => 'week',
			86400 => 'day',
			3600 => 'hour',
			60 => 'minute',
			1 => 'second'
		);
		foreach ($seconds as $unit => $text){
			if($time < $unit) continue;
			$totalUnits = floor($time / $unit);
			return $totalUnits.' '.$text.(($totalUnits>1)?'s ':' ')."ago";
		}
	}
	$query = mysql_query("SELECT * FROM komentar where pid = $pid order by id desc") or die (mysql_error());
		while($row = mysql_fetch_assoc($query)){
			$nama = $row['nama'];
			$email = $row['email'];
			$komentar = $row['komentar'];						
			$tanggal = $row['tanggal'];						
			echo "<li class=\"art-list-item\">
				<div class=\"art-list-item-title-and-time\">
					<h2 class=\"art-list-title\">".$nama."</h2>
				<div class=\"art-list-time\">".DisplayWaktu($tanggal)."</div>
				</div>
				<p>".$komentar."</p>
			</li>";
		}
echo "</ul>";
?>