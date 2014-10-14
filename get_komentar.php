<?php
require("connect_database.php");
$idPost = $_REQUEST["id"];
$komen = mysqli_query($con, "SELECT * FROM `komentar` where `id_post` = '$idPost' ORDER BY `tanggal` DESC");

date_default_timezone_set("Asia/Jakarta");
$currentDate = date("Y-m-d H:i:s");

// detik semua
$tanggalSekarang = strtotime($currentDate);

function selisihWaktu($waktu1, $waktu2) {
// mengambalikan waktu1 - waktu2
	$selisih = $waktu1 - $waktu2;
	if ($selisih >= 86400) {
		$hari = (int)((int)$selisih / 86400);
		return $hari." hari yang lalu";
	} else if ($selisih >= 3600) {
		$jam = (int)((int)$selisih/3600);
		return $jam. " jam yang lalu";
	} else if ($selisih > 60) {
		$menit = (int)((int)$selisih/60);
		return $menit. " menit yang lalu";
	} else {
		return "0 menit yang lalu";
	}
}

while ($row = mysqli_fetch_array($komen)) {
	echo		'<li class="art-list-item">';
	echo			'<div class="art-list-item-title-and-time">';
	echo				'<h2 class="art-list-title">'; echo $row["nama"]; echo'</h2>';
	echo				'<div class="art-list-time">'; echo selisihWaktu($tanggalSekarang, strtotime($row["tanggal"])); echo'</div>';
	echo			'</div>';
	echo			'<p>'; echo $row["komentar"]; echo ' &hellip;</p>';
	echo		'</li>';
}

?>