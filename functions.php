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
			$date = tanggalProcessor($row['tanggal']);
			$content = $row['konten'];
			$content = str_replace("\n", " ", $content);
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
				<p>';
				if(str_word_count($content) > 30){
					echo implode(' ', array_slice(explode(' ', $content), 0, 30)) . '&hellip;';
				}
				else{
					echo $content;
				}
				echo '</p>
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

function tanggalProcessor($date){
	date_default_timezone_set("Asia/Jakarta");
	$dateNow = date('Y-m-d');
	if(strcmp(date("n-Y",strtotime($dateNow)), date("n-Y",strtotime($date))) == 0 && date("d",strtotime($dateNow)) - date("d",strtotime($date)) <= 3){
		if(date("d",strtotime($dateNow)) - date("d",strtotime($date)) == 0) return "Hari ini";
		else return date("d",strtotime($dateNow)) - date("d",strtotime($date)) . " hari yang lalu";
	}
	else{
		$datePart = explode('-', $date);
		$bulan;
		switch($datePart[1]){
			case 1 : $bulan = " Januari "; break;
			case 2 : $bulan = " Februari "; break;
			case 3 : $bulan = " Maret "; break;
			case 4 : $bulan = " April "; break;
			case 5 : $bulan = " Mei "; break;
			case 6 : $bulan = " Juni "; break;
			case 7 : $bulan = " Juli "; break;
			case 8 : $bulan = " Agustus "; break;
			case 9 : $bulan = " September "; break;
			case 10 : $bulan = " Oktober "; break;
			case 11 : $bulan = " November "; break;
			case 12 : $bulan = " Desember "; break;
		}
		$datePart[2] = 1*$datePart[2]; //dijadikan integer
		$datePart[0] = 1*$datePart[0]; //dijadikan integer
		return $datePart[2].$bulan.$datePart[0];
	}
}

function commentTimeProcessor($timestamp){
	$dateTime = explode(' ', $timestamp);
	
	// cek date
	date_default_timezone_set("Asia/Jakarta");
	$dateNow = date('Y-m-d');
	if(strcmp($dateNow,$dateTime[0]) == 0){
		$timeNow = date('H:i:s');
		$timePart = explode(':', $dateTime[1]);
		$timeNowPart = explode(':', $timeNow);
		if($timePart[0] == $timeNowPart[0]){
			//echo " sama jam";
			if($timePart[1] == $timeNowPart[1]){
				return "beberapa detik yang lalu";
			}
			else{
				//echo $timeNow;
				//echo $dateTime[1];
				return ($timeNowPart[1] - $timePart[1])." menit yang lalu";
			}
		}
		else{
			//echo $timeNow;
			//echo $dateTime[1];
			return ($timeNowPart[0] - $timePart[0])." jam yang lalu";
		}
	}
	else if(strcmp(date("n-Y",strtotime($dateNow)), date("n-Y",strtotime($dateTime[0]))) == 0 && date("d",strtotime($dateNow)) - date("d",strtotime($dateTime[0])) <= 3){
		return date("d",strtotime($dateNow)) - date("d",strtotime($dateTime[0])) . " hari yang lalu";
	}
	else{
		return tanggalProcessor($dateTime[0]);
	}
}


?>
