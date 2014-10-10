<?php
	include ("connect.php");
			$idpost=$_GET['id'];
			$listkomen = mysql_query("SELECT * FROM `komentar_post` WHERE (`id`='$idpost' AND `nama` IS NOT NULL) ORDER BY `tanggal_kom` DESC");
			
			while($comment = mysql_fetch_array($listkomen))
			{
				echo '<li class="art-list-item">';
				echo 	'<div class="art-list-item-title-and-time">';
				echo		'<h2 class="art-list-title"><a href="#">'.$comment['nama'].'</a></h2>';
				//echo		'<div class="art-list-time">'.$comment['tanggal'].'</div>';
				echo	'</div>';
				echo	'<p>'.$comment['komentar'].'</p>';
				
			}
?>