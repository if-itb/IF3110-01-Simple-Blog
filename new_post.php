<!DOCTYPE html>
<html>
<body>

<?php
$Judul = $_POST["Judul"];
$Tanggal = $_POST["Tanggal"];
$Konten = $_POST["Konten"];

$con=mysqli_connect("localhost", "root", "", "SimpleBlog");
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	echo "<br>";
}

// Insert into Posts
// escape variables for security
$Judul = mysqli_real_escape_string($con, $_POST['Judul']);
$Tanggal = mysqli_real_escape_string($con, $_POST['Tanggal']);
$Konten = mysqli_real_escape_string($con, $_POST['Konten']);

$sql="INSERT INTO Posts (Judul, Tanggal, Konten)
VALUES ('$Judul', '$Tanggal', '$Konten')";

if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
}
echo "1 record added";
echo "<br>";

mysqli_close($con);

header("location: index.php");

?>

</body>