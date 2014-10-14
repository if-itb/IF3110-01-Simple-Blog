<?php
$con=mysqli_connect("localhost","root","","simpleblog");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$title = mysqli_real_escape_string($con, $_POST['title']);
$content = mysqli_real_escape_string($con, $_POST['content']);
$sql="UPDATE posts SET post_title='$title', post_date='$_POST[date]', post_content='$content'
WHERE post_id='$_POST[id]'";
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record edited";
mysqli_close($con);

header('Location: index.php');
?>