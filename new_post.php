<?php
$judul = $_POST["Judul"];
$tanggal = date($_POST["Tanggal"]);
$konten = $_POST["Konten"];
echo $judul,"<br>", $tanggal,"<br>", $konten,"<br>";

$con=mysqli_connect("localhost","root","akhfa","blog");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
	echo "Berhasil konek mysql";
}

mysqli_query($con,"INSERT INTO post (judul, tanggal, konten)
                    VALUES ('$judul', '$tanggal','$konten')");

#mysqli_query($con,"INSERT INTO Persons (FirstName, LastName, Age)
#VALUES ('Glenn', 'Quagmire',33)");

mysqli_close($con);
?> 