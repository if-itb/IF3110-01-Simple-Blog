<?php
	require("koneksi_mysql.php");
	
	$id_post = $_GET['id_post'];
	$query = mysql_query("SELECT * FROM tbl_comment WHERE id_post = '$id_post' ORDER BY id_comment desc");
	
	function konvertBulan($bulanx){
		$nama = array("Januari", "Februari", "Maret",
				   "April", "Mei", "Juni",
				   "Juli", "Agustus", "September",
				   "Oktober", "November", "Desember");
		return $nama[(int)$bulanx-1];
	}
	
	while($row = mysql_fetch_array($query))
	{
		$nama_komen = $row['nama'];
		$tanggal_komen = $row['tanggal'];
		$komen = $row['komentar'];
		
		list($tahun, $bulan, $tgl) = explode("-", $tanggal_komen);
		$namaBulan = konvertBulan($bulan);
		
		$tanggal_lengkap = $tgl.' '.$namaBulan.' '.$tahun;
		
		echo '<li class="art-list-item">';
		echo '	<div class="art-list-item-title-and-time">';
		echo '		<h2 class="art-list-title"><a href="#">'.$nama_komen.'</a></h2>';
		echo '		<div class="art-list-time">'.$tanggal_lengkap.'</div>';
		echo '	</div>';
		echo '	<p>'.str_replace("\n", "<br/>",$komen).'</p>';
		echo '</li>';
	}

?>