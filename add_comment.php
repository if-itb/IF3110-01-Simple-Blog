<?php
$postId = $_GET['id'];
$curDate = date("Y-m-d");
if(!empty($_POST)) {
	echo $curDate;
	$con=mysqli_connect("localhost","root","","simple_blog");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$name = mysqli_real_escape_string($con, $_POST['Nama']);
	$content = mysqli_real_escape_string($con, $_POST['Komentar']);
	$email = mysqli_real_escape_string($con, $_POST['Email']);
	$isSuccess = mysqli_query($con,"INSERT INTO comment (post_id,name,email,content,date) VALUES ('$postId','$name','$email','$content','$curDate')");
	mysqli_close($con);
}
?>
