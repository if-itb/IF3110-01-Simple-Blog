<!DOCTYPE html>
<html>
<body>
<script>
alert("submitter"); </script>
<?php
$con=mysqli_connect("localhost", "root", "", "dataPost");
$postid = $_GET['postid'];
$Judul = $_POST["Judul"];
$Tanggal = $_POST["Tanggal"];
$Konten = $_POST["Konten"];
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  echo "<br>";
}


// Create table Posts
$sql="UPDATE posts SET Judul = '$Judul',Tanggal = '$Tanggal', Konten = '$Konten' WHERE PID = $postid;";

// Execute query
if (mysqli_query($con,$sql)) {
} else {
  echo "Error creating table Posts: " . mysqli_error($con);
}

// Insert into Posts
// escape variables for security
$Judul = mysqli_real_escape_string($con, $_POST['Judul']);
$Tanggal = mysqli_real_escape_string($con, $_POST['Tanggal']);
$Konten = mysqli_real_escape_string($con, $_POST['Konten']);


if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

mysqli_close($con);

header("location: index.php");
?>

</body>