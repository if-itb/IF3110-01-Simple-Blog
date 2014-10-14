<html>
<body>

<?php
$con=mysqli_connect("localhost","root","","cilvia_simpleblog");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
							
$pid = $_GET['pid'];
$Nama = $_GET['nama'];
$Email = $_GET['email'];
$Komentar = $_GET['komentar'];

$sql = "INSERT INTO list_comment (PostID, nama, email, komentar, tanggal)
		VALUES ('$pid', '$Nama', '$Email', '$Komentar', NOW())";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

$result = mysqli_query($con,"SELECT * FROM list_comment WHERE PostID=$pid ORDER BY ComID DESC");
if (!$result) {
   die(mysql_error());
}

while($row = mysqli_fetch_array($result)) {
	echo '<li class="art-list-item">
		<div class="art-list-item-title-and-time">
			<h2 class="art-list-title"><a href="post.html">'.$row['nama'].'</a></h2>
			<div class="art-list-time">'.$row['tanggal'].'</div>
		</div>
		<p>'.$row['komentar'].'</p>
	</li>';
}

mysqli_close($con);
?>

</body>
</html>