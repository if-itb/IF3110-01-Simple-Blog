<?php
	mysql_connect("localhost", "root", "");
	mysql_select_db("simpleblog");	
	$var = $_POST['postid'];
	date_default_timezone_set("Asia/Jakarta"); 
	$date_time = date("m-d-Y, H:i:s");
	mysql_query("INSERT INTO komentar (idpost,nama,email,isikomen,tanggal) VALUES 
	('".$_POST['postid']."','".$_POST['Nama']."','".$_POST['Email']."','".$_POST['Komentar']."','".$date_time."')");
	echo '<li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title"><a href="post.php?postid='.$_POST['postid'].'">'.$_POST['Nama'].'</a></h2>
                        <div class="art-list-time">'.$date_time.'</div>
                    </div>
                    <p> '.$_POST['Komentar'].' </p>
	</li>';
?>

