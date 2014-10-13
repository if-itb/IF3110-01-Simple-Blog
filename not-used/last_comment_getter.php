<?php
	include("connect.php");
	$query	=	mysql_query("SELECT * from comments WHERE post_id_fk=$no ORDER BY com_date DESC LIMIT 1");
	$hasil_eksekusi = mysql_fetch_array($query);
	$name	=	$hasil_eksekusi['com_name'];
	$tanggal	=	$hasil_eksekusi['com_date'];
	$konten	=	$hasil_eksekusi['com_dis'];
	
	echo '
	<div id="div-komentar" align="center">
		'.$name.'<br/>
		'.$tanggal.'<br/>
		'.$konten.'</br>
		<hr/>
	</div>
	';
?>
