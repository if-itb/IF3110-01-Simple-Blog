<?php
extract($_GET);

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

// Update post to DB
$query = "DELETE FROM post WHERE id=$id";
mysqli_query($conn, $query);
mysql_close($conn);

header("Location:index.php");
?>