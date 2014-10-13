<?php
$con=mysqli_connect("localhost","root","","simpleblog");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
date_default_timezone_set("Asia/Jakarta"); 
$komentar = mysqli_real_escape_string($con, $_POST['komentar']);
$nama = mysqli_real_escape_string($con, $_POST['nama']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$date = date("Y-m-d H:i:s");
$sql="INSERT INTO comments (post_id, comment_name, comment_email, comment_date, comment_content)
VALUES ('$_POST[id]',' $nama', '$email', '$date' , '$komentar')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}else{
	echo "true";
}

mysqli_close($con);


?>