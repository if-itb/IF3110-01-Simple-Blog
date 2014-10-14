<?php
	$viewquery = 'SELECT * FROM post ORDER BY id DESC';
	$retval = mysql_query($viewquery, $connection);
	while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		echo '<li class="art-list-item">';
			echo '<div class="art-list-item-title-and-time">';
				echo '<h2 class="art-list-title"><a href="post.php?id='.$row["id"].'">'.$row["judul"].'</a></h2>';
				echo '<div class="art-list-time">'.$row["tanggal"].'</div>';
				echo '<div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>';
			echo '</div>';
			echo '<p>'.$row["konten"].'</p>';
			echo '<p>';
				echo '<a href="edit_post.php?id='.$row["id"].'">Edit</a> | <a href="javascript:deletePost('.$row["id"].')">Hapus</a>';
			echo '</p>';
		echo '</li>';
	}
?>