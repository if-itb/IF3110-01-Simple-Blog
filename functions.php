<?php

global $isconnected;
global $condb;

function connect_db($username, $password, $dbname){
	$GLOBALS['condb']=mysqli_connect("localhost",$username,$password,$dbname);
	
	// Check connection
	if (mysqli_connect_errno()) {
	  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
		$GLOBALS['isconnected'] = false;
	}
	else {
		$GLOBALS['isconnected'] = true;
	}
	return $GLOBALS['isconnected'];
}

function run_query($query){
	$result = mysqli_query($GLOBALS['condb'],$query);
	return $result;
}

function disconnect_db(){
	mysqli_close($GLOBALS['condb']);
}

function get_comments($pid){
	$selectionQuery = "SELECT * FROM sb_comments WHERE id_post='" . $pid . "' ORDER BY timestamp DESC";
	$result = run_query($selectionQuery);
	while($row = mysqli_fetch_array($result)){
		$nama = $row['nama'];
		$timestamp = $row['timestamp'];
		$comment = $row['komentar'];
		echo
		'<li class="art-list-item">
			<div class="art-list-item-title-and-time">
				<h2 class="art-list-title"><a href="post.php?pid=' . $pid . '">' . $nama . '</a></h2>
				<div class="art-list-time">' . $timestamp . '</div>
			</div>
			<p>' . $comment . '</p>
		</li>
		';
	}
}

function get_posts_list(){
	connect_db("root","","if3110_simple_blog_db");
	$selectionQuery = "SELECT * FROM sb_posts ORDER BY tanggal DESC";
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
			<!-- Delete Post Script -->
			<li class="art-list-item">
				<div class="art-list-item-title-and-time">
					<h2 class="art-list-title"><a href="post.php?pid=' . $pid . '">' . $title . '</a></h2>
					<div class="art-list-time">' . $date . '</div>
					<div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>
				</div>
				<p>' . $content . '</p>
				<p>
				  <a href="edit_post.php?pid=' . $pid . '">Edit</a> | <a id="deletepost' . $pid . '" href="#" >Hapus</a>
				</p>
			</li>
			<script type="text/javascript">
				var apost' . $pid . ' = document.getElementById("deletepost' . $pid . '");
				apost' . $pid . '.onclick = function() {
					var isDelete = confirm("Apakah Anda yakin menghapus post ini?");
					if(isDelete){
						window.location="post_processor.php?action=delete&pid=' . $pid . '"
					}
				}
			</script>';
		}
	}
	else{
	}
	
	disconnect_db();
}


?>