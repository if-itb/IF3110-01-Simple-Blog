<?php
	include ('koneksi.php'); 
			$id = $_GET['id'];
			$query = mysql_query("select * from komentar where id_post='$id' order by id DESC ");
			
			while ($data = mysql_fetch_array($query)){
              echo  '<li class="art-list-item">';
              echo      '<div class="art-list-item-title-and-time">';
              echo          '<h2 class="art-list-title"><a href="post.html">'. $data["Nama"] .'</a></h2>';
              echo          '<div class="art-list-time">2 menit lalu</div>';
              echo      '</div>';
              echo      '<p>'. $data["Komentar"].'</p>';
              echo  '</li>';
}
?>
