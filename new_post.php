<?php
# Catch post
$judul = $_POST["Judul"];
$tanggal = date($_POST["Tanggal"]);
$konten = $_POST["Konten"];
#echo $judul,"<br>", $tanggal,"<br>", $konten,"<br>";

# Input to databases
$con=mysqli_connect("localhost","root","akhfa","blog");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_query($con,"INSERT INTO post (judul, tanggal, konten)
                    VALUES ('$judul', '$tanggal','$konten')");

mysqli_close($con);

# Redirect to home
header('Location: index.php');
?> 