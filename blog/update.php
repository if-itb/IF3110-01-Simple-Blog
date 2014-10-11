<html>
<body>
<?php
$con=mysqli_connect("localhost","root","","simpleblog");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


echo $_POST['Judul'];
echo $_POST['Tanggal'];
echo $_POST['Konten'];

mysqli_query($con,"UPDATE post SET Judul= '".$_POST['Judul']."'where Id_Post='".$_GET["Id"]."'");
mysqli_query($con,"UPDATE post SET Tanggal= '".$_POST['Tanggal']."'where Id_Post='".$_GET["Id"]."'");
mysqli_query($con,"UPDATE post SET Konten= '".$_POST['Konten']."'where Id_Post='".$_GET["Id"]."'");



mysqli_close($con);

header('Location: index.php');
?>
</body>
</html>

