<!DOCTYPE>
<html>
<body>
<?php

// Create connection
$con=mysqli_connect("Localhost", "root","windy","blogwindy");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id_post = $_GET[id];

$judul = mysqli_real_escape_string($con, $_POST['Judul']);
$tanggal = mysqli_real_escape_string($con, $_POST['Tanggal']);
$konten = mysqli_real_escape_string($con, $_POST['Konten']);

mysqli_query($con, "UPDATE post SET Judul='$judul', Tanggal='$tanggal', Konten='$konten' WHERE id_post='$id_post'");
	


//close the connection
mysqli_close($con);

header("Location: index.php");
?>
</body>
</html>