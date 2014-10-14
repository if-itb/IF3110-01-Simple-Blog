<?php 
	include 'connect.php';
	include 'ConvertDateFunc.php';
	 date_default_timezone_set("Asia/Jakarta");
	 
	 function DeltaTimeConvert($t1,$t2){
	 $t = strtotime($t1) - strtotime($t2);
		if($t<60){
			return $t.' detik yang lalu';
		}else if($t<3600){
			$newt = floor($t/60);
			return $newt.' menit yang lalu';
		}else if($t<=86400){
			$newt = floor($t/3600);
			return $newt.' jam yang lalu';
		}else{
			return $t2;
		}
	 }
	 
	$id=$_REQUEST["id"];
	echo ' <ul class="art-list-body">';
	$postQuery= 'SELECT * FROM `tucildb_13511097`.`post-komen` WHERE `id_post`='.$id.' ORDER BY `tanggal` DESC';
	$postResult =  mysql_query($postQuery,$con);
	if($postResult === FALSE) {
		die(mysql_error()); // TODO: better error handling
	}
	while($search_row = mysql_fetch_array($postResult)) {
		$nama = $search_row['nama'];
		$full_date = $search_row['tanggal'];
		$date_now = date('Y-m-d H:i:s');
		$date = ConvertDate($search_row['tanggal']);
		$isi = $search_row['isi'];
		
		
		echo '
			<li class="art-list-item">
			<div class="art-list-item-title-and-time">
				<h2 class="art-list-title"><a href="post.php?id='.$id.'">'.$nama.'</a></h2>
				<div class="art-list-time">'.DeltaTimeConvert($date_now,$full_date).' </div>
			</div>
			<p>'.$isi.'</p>
			</li>
		';
	}
	echo ' </ul>';

?>