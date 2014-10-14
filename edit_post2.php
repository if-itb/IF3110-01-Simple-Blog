<html>
<body>	
<?php
$con=mysqli_connect("localhost","root","","wbd");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
//$Judul = mysqli_real_escape_string($con, $_POST['Judul']);
//$Tanggal = mysqli_real_escape_string($con, $_POST['Tanggal']);
//$Konten = mysqli_real_escape_string($con, $_POST['Konten']);

//mysqli_query($con,"UPDATE post SET Judul='".$_POST['Judul']."' AND Tanggal='".$_POST['Tanggal']."' AND Konten='".$_POST['Konten']."' WHERE PostID='".$_POST['PostID']."'");

$sql="UPDATE post SET Judul='".$_GET['Judul']."' , Tanggal='".$_GET['Tanggal']."' , Konten='".$_GET['Konten']."' WHERE PostID='".$_GET['PostID']."'";
//echo "UPDATE post SET Judul='".$_GET['Judul']."' AND Tanggal='".$_GET['Tanggal']."' AND Konten='".$_GET['Konten']."' WHERE PostID=".$_GET['PostID']."";
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}


mysqli_close($con);
header("Location:index.php");
?>
</body>
</html>