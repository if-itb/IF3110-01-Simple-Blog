<!DOCTYPE html>
<html>
<body>

<?php
	$Nama = $_GET["Nama"];
	$Email = $_GET["Email"];
	$Komentar = $_GET["Komentar"];
	$Tanggal = date('Y-m-d');
	$ID = $_GET["ID"];
	
	$connection = mysqli_connect("localhost", "root", "", "blog");
	$query = "INSERT INTO comment (Nama, Email, Komentar, Tanggal, ID)
			VALUES ('$Nama','$Email','$Komentar','$Tanggal','$ID')";
	if (!mysqli_query($connection,$query)){
		die(mysqli_error($connection));}
	
	$query = mysqli_query($connection,"
		SELECT * 
		FROM comment 
		WHERE ID ='$ID' ORDER BY ID_comment DESC
	");
	while($data = mysqli_fetch_array($query)){
		echo '
		<li class="art-list-item">
		<div class="art-list-item-title-and-time">
		<h2 class="art-list-title"><a href="post.php" >'.$data['Nama'].'</a></h2>
		<div class="art-list-time">'.$data['Tanggal'].'</div>
		</div>
		<p id="komen">'.$data['Komentar'].'</p>
		</li>'
	;}
?>

</body>