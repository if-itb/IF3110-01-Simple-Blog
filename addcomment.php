<?php
	$con=mysqli_connect("localhost", "root", "chmod777", "blog");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " .mysqli_connect_error();
	}
	$id = $_GET['id'];
	$name = mysqli_real_escape_string($con, $_GET['name']);
	$email = mysqli_real_escape_string($con, $_GET['email']);
	date_default_timezone_set("Asia/Jakarta");
	$time = date("Y-m-d h:i:s");
	$content = mysqli_real_escape_string($con, $_GET['content']);
	$sql="INSERT INTO comment_table (id_post, name, email, time, content)
		VALUES ('$id','$name', '$email', CAST('".$time."' AS DATE), '$content')";

	if (!mysqli_query($con,$sql)) {
		die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
	echo '<li class="art-list-item">';
	echo '<div class="art-list-item-title-and-time">';
	echo '<h2 class="art-list-title"><a>'.$name.'</a></h2>';
	echo '<div class="art-list-time">'.$time.'</div>';
	echo '</div>';
	echo '<p>'.$content.'</p>';
	echo '</li>';
?>
