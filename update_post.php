<?php
//create connection
$con=mysqli_connect("localhost","root","asdasd123","blog");

//check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL : " . mysqli_connect_error();
}

// escape variables for security
$judul = mysqli_real_escape_string($con, $_POST['Judul']);
$tanggal = mysqli_real_escape_string($con, $_POST['Tanggal']);
$content = mysqli_real_escape_string($con, $_POST['Konten']);
$id_post = $_GET['id_post'];

//update table
mysqli_query($con,"UPDATE post SET judul='$judul', tanggal='$tanggal', content='$content' WHERE id_post='$id_post'");

//close mysql
mysqli_close($con);

header("Location: index.php");
?>