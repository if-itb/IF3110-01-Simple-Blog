<?php

	include "db.php";
	
	$id = mysql_real_escape_string($_GET['id']);
	$output = "";
	
	// echo '<p>Hello there!</p>'.$id;
	
	$result=mysql_query("SELECT * FROM komentar WHERE id_blog = $id ORDER BY timestamp DESC;");
	
	if (mysql_num_rows($result) !== 0)
	{
		while($row=mysql_fetch_array($result))
		{
			$output .= '<li class="art-list-item">';
			$output .= '<div class="art-list-item-title-and-time">';
			$output .= '<h2 class="art-list-title"><a href="post.html">'.$row['nama'].'</a></h2>';
			$output .= '<div class="art-list-time">'.$row['timestamp'].'</div>';
			$output .= '</div>';
			$output .= '<p>'.$row['komentar'].'</p>';
			$output .= '</li>';
		}
	}
	else
	{
		$output = "<p>Saat ini belum ada komentar untuk post ini.</p>";
	}
	
	
	echo $output;