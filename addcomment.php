<?php

	include "db.php";
	
	$id_blog = mysql_real_escape_string($_POST['id_blog']);
	$nama = mysql_real_escape_string($_POST['nama']);
	$email = mysql_real_escape_string($_POST['email']);
	$komentar = mysql_real_escape_string($_POST['komentar']);
	$output = "";
	
	mysql_query("INSERT INTO komentar(id_blog,nama,email,komentar) VALUES('$id_blog','$nama','$email','$komentar');");
	

	$result=mysql_query("SELECT * FROM komentar WHERE id_blog = $id_blog ORDER BY timestamp DESC;");
	

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
	
	
	echo $output;