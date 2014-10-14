<?php
// Create connection
$con=mysqli_connect("localhost","root","","blog_content");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$id_blog = mysqli_real_escape_string($con, $_GET['id_blog']);

$sql = "SELECT * FROM `komentar` WHERE `ID_BLOG` = $id_blog";

$result = mysqli_query($con,$sql);
if (!$result) {
  die('Error: ' . mysqli_error($con));
}

while($row = mysqli_fetch_array($result)) {
	echo '<li class="art-list-item">';
    echo '<div class="art-list-item-title-and-time">';
    echo '<h2 class="art-list-title">'.$row['NAMA'].'</h2>';
    echo '<div class="art-list-time">'.$row['WAKTU'].'</div>';
    echo '</div>';
	echo '<p>'.$row['KOMENTAR'].'</p>';
    echo '</li>';
}

mysqli_close($con);
?>