<?php
// Create connection
$con=mysqli_connect("localhost","root","","blog_content");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$judul = mysqli_real_escape_string($con, $_POST['Judul']);
$tanggal = mysqli_real_escape_string($con, $_POST['Tanggal']);
$konten = mysqli_real_escape_string($con, $_POST['Konten']);

//parsing tanggal dari html ke mysql
list($hari, $bulan, $tahun) = explode("/", $tanggal);
$tanggal = $tahun."-".$bulan."-".$hari;

$sql = "INSERT INTO `blog`(`TANGGAL`, `JUDUL`, `ISI`)
VALUES ('$tanggal', '$judul' , '$konten')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}


mysqli_close($con);

header("Location: index.php"); /* Redirect browser */
exit();
?>