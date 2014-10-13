<!DOCTYPE html>
<html>
<body>

<?php
$PID = $_GET["PID"];

$con=mysqli_connect("localhost", "root", "", "SimpleBlog");
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	echo "<br>";
}

$resultComment = mysqli_query($con,"SELECT * FROM Comments WHERE PID='$PID' order by CID DESC");

while($rowComment = mysqli_fetch_array($resultComment)){
	echo'
		<li class="art-list-item">
			<div class="art-list-item-title-and-time">
				<h2 class="art-list-title"><a href="post.php">'.$rowComment['Nama'].'</a></h2>
				<div class="art-list-time">'.$rowComment['Waktu'].'</div>
			</div>
			<p>'.$rowComment['Komentar'].'&hellip;</p>
		</li>
	';
}

mysqli_close($con);
?>

</body>