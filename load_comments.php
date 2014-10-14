<!-- Ananda Kurniawan /13511052--> 

<?php
	$id_post = $_GET['id_post'];
	include('config.php');
	$query = "SELECT * FROM komentar WHERE id_post='".$id_post."' ORDER BY tanggal DESC";	
	$result = mysql_query($query);              
	
	$listofcomments = '';
	while($komentar = mysql_fetch_array($result)) {
		$tanggal = date("Y-m-d", strtotime($komentar['tanggal']));
		$listofcomments = $listofcomments . '<li class="art-list-item"><div class="art-list-item-title-and-time"><h2 class="art-list-title"><a href="#">'.$komentar['nama'].'</a></h2><div class="art-list-time">'.printTanggal($tanggal).'</div></div><p>'.$komentar['komentar'].'</p></li>';
	}	
	echo $listofcomments;	

	function printTanggal($date) {
		$splittedDate = explode("-", $date);
		$num_month = $splittedDate[1];
		$date = $splittedDate[2];
		$year = $splittedDate[0];

		switch ($num_month) {
					case "01": 
							$month = "Januari";
							break;
					case "02": 
							$month = "Februari"; 
							break;
					case "03": 
							$month = "Maret"; 
							break;
					case "04": 
							$month = "April"; 
							break;
					case "05": 
							$month = "Mei"; 
							break;
					case "06": 
							$month = "Juni"; 
							break;
					case "07": 
							$month = "Juli"; 
							break;
					case "08": 
							$month = "Agustus"; 
							break;
					case "09": 
							$month = "September"; 
							break;
					case "10": 
							$month = "Oktober"; 
							break;
					case "11": 
							$month = "November"; 
							break;
					case "12": 
							$month = "Desember"; 
							break;
					default: break;
		}

		return $date." ".$month." ".$year;  
	}

?> 
