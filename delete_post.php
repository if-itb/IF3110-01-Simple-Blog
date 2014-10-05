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
mysqli_query($con,"DELETE FROM Posts WHERE PID='$ID'");
echo $ID;
echo "<br>";
mysqli_close($con);

header("location: index.php");
?>
</body>