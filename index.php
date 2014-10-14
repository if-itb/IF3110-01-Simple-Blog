<!DOCTYPE html>
<html>
<head>
	<title>Baspram's Homepage</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<meta name="author" content="Bagaskara Pramudita">
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="favicon.ico">
</head>
<body>
	<div id="topLogo"><img src="logo/bp.png"></div>
	<div id="topNav">
		<ul>
			<li class="title"><a href="">SIMPLE BLOG</a></li>
			<li class="right"><a href="insertpost.php"><button class="button">&#43 TAMBAH POST</button></a></li>
		</ul>
	</div>
	<div id="POSTS">
	<?php
		$con=mysqli_connect("localhost","root","","simpleblog");
		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$result = mysqli_query($con,"SELECT * FROM posts ORDER BY post_id DESC");
		while($post = mysqli_fetch_array($result)) {
		echo'<div id="'.$post['post_id'].'" class="post">';
			echo'<div class="title">';
			$string = strip_tags($post['post_title']);
			$newstring = wordwrap($string, 20, "<br>", false);
				echo'<a href="post.php?post_id='.$post['post_id'].'"><h1 id="postJudul">' .$newstring .'</h1></a>';
				echo'<h5 id="postTanggal">'.date('d-m-Y' ,strtotime($post['post_date'])).'</h5>';
			echo'</div>';
			$string = strip_tags($post['post_content']);
			if (strlen($string) > 80) {
			    $stringCut = substr($string, 0, 80);
			    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'. . . . .'; 
			}
			echo'<div class="content"> <p id="postKonten">'. $string.'</p>';
				echo '<a href="editpost.php?post_id='. $post['post_id'].'">';?>
				<button class="button">UBAH</button> </a> | 
				<?php echo '<button onclick="deletePost('.$post['post_id'].')" class="button">HAPUS</button>';
			echo'</div>	';
		echo '</div>';
	}
	mysqli_close($con);
	?>
	</div>
	<script type="text/javascript">
		function deletePost(vara){
		    if (confirm("Apakah Anda yakin menghapus post ini?") == true) {
		        location.href = 'delete.php?post_id='+vara;
		    }
		};
	</script>
</body>
</html>
