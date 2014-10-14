<!DOCTYPE html>
<html>
<body>

<?php
$Nama = $_GET["nama"];
$Email = $_GET["email"];
$Komentar = $_GET["komentar"];
$postid= $_GET["postid"];

// Create database dataPost

$con=mysqli_connect("localhost", "root", "", "dataPost");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql="INSERT INTO komentar (Nama,Email, Komentar,Tanggal,postid)
VALUES ('$Nama', '$Email', '$Komentar',NOW(),$postid)";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
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