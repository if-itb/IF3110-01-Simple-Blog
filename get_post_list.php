<?php
// include functions.php
include 'functions.php';

//operasi pengambilan pos dari database
connect_db("root","","if3110_simple_blog_db");
$selectionQuery = "SELECT * FROM sb_posts";
$result = run_query($selectionQuery);
if($result){
	while($row = mysqli_fetch_array($result)){
		$pid = $row['id_post'];
		$title = $row['judul'];
		$date = $row['tanggal'];
		$content = $row['konten'];
		//penulisan pos ke database
		echo 
		'
		
		<li class="art-list-item">
			<div class="art-list-item-title-and-time">
				<h2 class="art-list-title"><a href="post.php?pid=' . $pid . '">' . $title . '</a></h2>
				<div class="art-list-time">' . $date . '</div>
				<div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>
			</div>
			<p>' . $content . '</p>
			<p>
			  <a href="edit_post.php/'.$pid.'">Edit</a> | <a href="#" >Hapus</a>
			</p>
		</li>';
	}
}
else{
}

disconnect_db();

?>