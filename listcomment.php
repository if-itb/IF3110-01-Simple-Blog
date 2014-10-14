<?php
	require("sqlconnect.php");
	$id = $_GET["id"];
	$viewquery = "SELECT * FROM komentar WHERE id_post='$id' ORDER BY id_komentar DESC";
	$retval = mysql_query($viewquery, $connection);
	while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		echo '<li class="art-list-item">';
            echo '<div class="art-list-item-title-and-time">';
				echo '<h2 class="art-list-title"><a href="post.php">'.$row["nama"].'</a></h2>';
				echo '<div class="art-list-time">'.$row["tanggal"].'</div>';
			echo '</div>';
			echo '<p>'.$row["isi"].'&hellip;</p>';
        echo '</li>';
	}
?>