<!DOCTYPE html>
<html>
<body>

<?php
$con=mysqli_connect("localhost", "root", "", "SimpleBlog");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  echo "<br>";
}

$ID = $_GET['id'];
$Judul = $_POST['Judul'];
$Tanggal = $_POST['Tanggal'];
$Konten = $_POST['Konten'];
$result = mysqli_query($con,"SELECT Judul, Tanggal, Konten FROM Posts WHERE PID='$ID'");

mysqli_query($con,"UPDATE Posts SET Judul='$Judul',
					Tanggal='$Tanggal',
					Konten='$Konten'
					WHERE PID='$ID'");

echo "1 record edited";
echo "<br>";
mysqli_close($con);

header("location: index.php");
?>

</body>