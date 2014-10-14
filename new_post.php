<html>
<body>

<?php
$con=mysqli_connect("localhost","root","","cilvia_simpleblog");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$Judul = mysqli_real_escape_string($con,$_POST["Judul"]);							
$Tanggal = mysqli_real_escape_string($con,$_POST["Tanggal"]);
$Konten = mysqli_real_escape_string($con,$_POST["Konten"]);

$sql = "INSERT INTO list_post (judul, tanggal, konten)
		VALUES ('$Judul', '$Tanggal', '$Konten')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header("location:index.php");
?>

</body>
</html>