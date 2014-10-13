<?php
	//Open connection to mysql
	$con=mysqli_connect("localhost","root","","simple_blog");
	//Error checking
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else{
		$id=mysqli_real_escape_string($con, $_GET['id']);
		$nama=mysqli_real_escape_string($con, $_GET['nama']);
		$email=mysqli_real_escape_string($con, $_GET['email']);
		$komentar=mysqli_real_escape_string($con, $_GET['komentar']);
		$tanggal=mysqli_real_escape_string($con, $_GET['tanggal']);
		if ($nama!='' && $email!='' && $komentar!='' && $tanggal!='' ){
			$sql = mysqli_query($con,"INSERT INTO comment(nama,email,komentar,post_id,tanggal) VALUES ('$nama', '$email','$komentar','$id','$tanggal')");	
		}
		$ask = mysqli_query($con,"SELECT * FROM comment WHERE post_id=$id ORDER BY comment_id desc");
		while ($row = mysqli_fetch_array($ask)){
			echo "<li class='art-list-item'>";
			echo "<div class='art-list-item-title-and-time'>";
			echo "<h2 class='art-list-title'>";
			echo "<a href='post.php?id=". $id ."'>"  . $row['nama'] . "</a></h2>";
			echo "<div class=\'art-list-time\''>" .$tanggal. "</div>";
			echo "</div>";
			echo "<p>" . $row['komentar'] . "</p>";
			echo "</li>";
		}
		mysqli_close($con);
	}
?>