<?php
	$postid = $_POST["postid"];
	$nama = $_POST["nama"];
	$email = $_POST["email"];
	$komen = $_POST["komen"];
	mysql_connect("localhost","root","");
	@mysql_select_db("simpleblog") or die( "Unable to select database");
	$query = "INSERT INTO comment (idpost,nama,email,komentar) Values (".$postid.",\"".$nama."\",\"".$email."\",\"".$komen."\");";
	mysql_query($query);
	echo '<li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title"><a href="post.html">'.$nama.'</a></h2>
                        <div class="art-list-time">0 menit lalu</div>
                    </div>
                    <p>'.$komen.'</p>
                </li>';
?>