<!DOCTYPE html>
<html>
<body>

<?php

$postid= $_GET["postid"];

// Create database dataPost

$con=mysqli_connect("localhost", "root", "", "dataPost");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$resultc = mysqli_query($con,"SELECT * FROM komentar WHERE postid = '$postid' order by commentid desc");
while($rowc = mysqli_fetch_array($resultc)){
	echo '   
	<li class="art-list-item">
                <div class="art-list-item-title-and-time">
                    <h2 class="art-list-title"><a href="post.php" >'.$rowc['Nama'].'</a></h2>
                    <div class="art-list-time">'.$rowc['Tanggal'].'</div>
                </div>
                <p id="komen">'.$rowc['Komentar'].'</p>
            </li>';

}

mysqli_close($con);
?>

</body>