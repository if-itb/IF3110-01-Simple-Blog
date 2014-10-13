<?php
	require("koneksi_mysql.php");
	
	$id_post = $_POST['ID_post'];
	$nama = $_POST['Nama'];
	$email = $_POST['Email'];
	$komentar = $_POST['Komentar'];
	
	$tanggal_sekarang = date('d-m-Y');
	list($tgl, $bulan, $tahun) = explode("-", $tanggal_sekarang);
	
	$tanggal = $tahun.'-'.$bulan.'-'.$tgl;
	
	$query = mysql_query("INSERT INTO tbl_comment(id_post, nama, email, tanggal, komentar) VALUES('$id_post', '$nama', '$email', '$tanggal', '$komentar')", $connection) or die(mysql_error());
	
	/* menampilkan komen terbaru */
	$query_comment = mysql_query("SELECT * FROM tbl_comment ORDER BY id_comment desc LIMIT 1");
	
	function konvertBulan($bulanx){
		$nama = array("Januari", "Februari", "Maret",
				   "April", "Mei", "Juni",
				   "Juli", "Agustus", "September",
				   "Oktober", "November", "Desember");
		return $nama[(int)$bulanx-1];
	}
	
	while($row2 = mysql_fetch_array($query_comment))
	{
		$nama_komen = $row2['nama'];
		$tanggal_komen = $row2['tanggal'];
		$komen = $row2['komentar'];
		
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