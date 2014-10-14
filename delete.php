

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

$id_delete = $_GET['idpost'];
mysqli_query($con,"DELETE FROM post WHERE id_post='$id_delete'");



//close the connection
mysqli_close($con);

header("Location: index.php");
?>
</body>
</html>