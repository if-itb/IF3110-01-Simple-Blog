<?php
	$postId = $_GET['postId'];
	$con = mysqli_connect("localhost","root","","if3110-tugas1");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$qry = "SELECT * FROM komentar WHERE id_post =".$postId." ORDER BY id_komentar DESC";
	$result = mysqli_query($con, $qry);
	//echo $qry;
	while($row = mysqli_fetch_array($result)) {
		echo "<li class=\"art-list-item\">";
		echo "<div class=\"art-list-item-title-and-time\">";
		echo "<h2 class=\"art-list-title\">".$row['nama']."</h2>";
		echo "<div class=\"art-list-time\">".$row['tanggal_komentar']."</div>";
		echo "</div>";
		echo "<p>".$row['isi']."</p>";
		echo "</li>";
	}
	mysqli_close($con);
?>