<!DOCTYPE html>
<html>
<body>

<?php
$Judul = $_POST["Judul"];
$Tanggal = $_POST["Tanggal"];
$Konten = $_POST["Konten"];

$con=mysqli_connect("localhost", "root", "", "SimpleBlog");
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	echo "<br>";
}

// Insert into Posts
// escape variables for security
$Judul = mysqli_real_escape_string($con, $_POST['Judul']);
$Tanggal = mysqli_real_escape_string($con, $_POST['Tanggal']);
$Konten = mysqli_real_escape_string($con, $_POST['Konten']);

$sql="INSERT INTO Posts (Judul, Tanggal, Konten)
VALUES ('$Judul', '$Tanggal', '$Konten')";

if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
}
echo "1 record added";
echo "<br>";

mysqli_close($con);

header("location: index.php");

echo'
	<li class="art-list-item">
		<div class="art-list-item-title-and-time">
			<h2 class="art-list-title"><a href="post.html">'.$baris['Nama'].'</a></h2>
			<div class="art-list-time">2 menit lalu</div>
		</div>
		<p>'.$baris['Komentar'].'&hellip;</p>
	</li>
';

?>

</body>