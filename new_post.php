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

// Create database SimpleBlog
$sql="CREATE DATABASE IF NOT EXISTS SimpleBlog";
if (mysqli_query($con,$sql)) {
  echo "Database SimpleBlog created successfully";
  echo "<br>";
} else {
  echo "Error creating database SimpleBlog: " . mysqli_error($con);
  echo "<br>";
}


// Create table Posts
$sql="CREATE TABLE IF NOT EXISTS Posts(PID INT NOT NULL AUTO_INCREMENT,
										PRIMARY KEY(PID),
										Judul varchar(50),
										Tanggal DATE,
										Konten text)";


// Execute query
if (mysqli_query($con,$sql)) {
  echo "Table Posts created successfully";
  echo "<br>";
} else {
  echo "Error creating table Posts: " . mysqli_error($con);
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