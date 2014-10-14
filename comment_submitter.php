<?php
	date_default_timezone_set('Asia/Jakarta');
	$date = date('Y-m-d H:i:s');
	$d1 = new DateTime();
	$now = new DateTime();
	$username = "root";
	$password = "";
	$db = "simpleblog";
	$query = "INSERT INTO `comments`(`PostID`, `Date`, `Name`, `Email`, `Content`) VALUES (".$_POST['id'].",'".$date."','".$_POST['Nama']."','".$_POST['Email']."','".$_POST['Komentar']."')";
	$con = mysqli_connect('localhost', $username,$password,$db) or die("Unable to connect to MySQL");	
	$result = mysqli_query($con,$query) or die("Unable to execute query");
	mysqli_close($con);
	echo '<li class="art-list-item">
			<div class="art-list-item-title-and-time">
				<h2 class="art-list-title"><a href="mailto:'.$_POST['Email'].'">'.$_POST['Nama'].'</a></h2>
					<div class="art-list-time">'.get_dif($d1,$now).'</div>
				</div>
			<p>'.$_POST['Komentar'].'</p>
		  </li>';
		  
	function get_dif($date1,$date2)
	{
		$res = "";
		//$date2 = new DateTime($dn);
		$dif = $date2->diff($date1);
		if($dif->y > 0) $res = $dif->y." tahun lalu";
		else if($dif->m > 0) $res = $dif->m." bulan lalu";
		else if($dif->d > 0) $res = $dif->d." hari lalu";
		else if($dif->h > 0) $res = $dif->h." jam lalu";
		else if($dif->i > 0) $res = $dif->i." menit lalu";
		else if($dif->s > 0) $res = $dif->s." detik lalu";
		else $res = "0 detik lalu";
		return $res;
	}
?>
