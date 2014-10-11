<html>
<body>
<?php
$con=mysqli_connect("localhost","root","","simpleblog");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_query($con,"DELETE FROM post WHERE Id_post='".$_GET["Id"]."'");


mysqli_close($con);

header('Location: index.php');
?>
</body>
</html>