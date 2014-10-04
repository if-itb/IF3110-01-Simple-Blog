<?php
extract($_POST);

// Format date to match MySQL style
$date = DateTime::createFromFormat('d/m/Y', $Tanggal)->format('Y-m-d');

// Connect to DB  
$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "db_simpleblog";
$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);

// Check connection
if (mysqli_connect_errno()) 
{
  echo "Failed to connect to MySQL: ". mysqli_connect_error();
}

// Fetch post from DB
$query = "INSERT INTO post VALUES ('', '$Judul', '$date', '$Konten')";
mysqli_query($conn, $query);
mysql_close($conn);

header("Location:index.php");
?>