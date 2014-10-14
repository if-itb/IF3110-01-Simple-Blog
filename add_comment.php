<?php
extract($_POST);

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

// Insert komentar to DB
$query = "INSERT INTO komentar VALUES ('', $postid, '$nama', '$email', '$komentar', now())";
$result = mysqli_query($conn, $query);

echo "Berhasil";

mysqli_close($conn);
?>