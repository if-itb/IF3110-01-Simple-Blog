<?php
$con=mysqli_connect("localhost","root","","simpleblog");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$title = mysqli_real_escape_string($con, $_POST['title']);
$content = mysqli_real_escape_string($con, $_POST['content']);

$sql="INSERT INTO posts (post_title, post_date, post_content)
VALUES ('$title', '$_POST[date]', '$content')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added";
echo ($_POST['date']);
mysqli_close($con);


header('Location: index.php');
?>