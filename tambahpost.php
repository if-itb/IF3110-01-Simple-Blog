<html>
<body>
<?php
$con=mysqli_connect("localhost","root","","wbd");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();	
}

// escape variables for security
$Judul = mysqli_real_escape_string($con, $_POST['Judul']);
$Tanggal = mysqli_real_escape_string($con, $_POST['Tanggal']);
$Konten = mysqli_real_escape_string($con, $_POST['Konten']);

$sql="INSERT INTO post (Judul, Tanggal, Konten)
VALUES ('$Judul', '$Tanggal', '$Konten')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header("Location:index.php");
?>
</body>
</html>