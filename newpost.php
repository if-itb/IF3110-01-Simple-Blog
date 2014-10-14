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

//insert into table
$sql="INSERT INTO post (judul, tanggal, content)
VALUES ('$judul', '$tanggal', '$content')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

//close mysql
mysqli_close($con);

header("Location: index.php");
?>