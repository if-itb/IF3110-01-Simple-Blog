<?php
	require('sql_connect.inc'); 
	sql_connect('blog');

	$id = $_GET['id'];

 	$query = "SELECT nama, tanggal, komentar FROM komentar WHERE id_post=$id ORDER BY id DESC";
	$result = mysql_query($query);

	while($row=mysql_fetch_array($result, MYSQL_ASSOC)) {
		$nama = $row['nama'];
		$komentar = $row['komentar'];
		$tanggal = date('M j y g:i A', strtotime($row['tanggal']));

	echo '<li class="art-list-item">    
            <div class="art-list-item-title-and-time">
                <h2 class="art-list-title"><a href="#">'.str_replace(" ", "<br/>", $nama).'</a></h2>
                <div class="art-list-time">'.$tanggal.'</div>
            </div>
            <p>'.str_replace("\n","<br />",$komentar).'&hellip;</p>    
           </li>';
    }
?>

