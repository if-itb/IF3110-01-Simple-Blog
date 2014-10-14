<?php

//create connection
$connect=mysqli_connect("localhost","root", "", "simple_blog");

// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$Judul = $_POST['Judul'];
$Tanggal = $_POST['Tanggal'];
$Konten = $_POST['Konten'];


if($_GET['type']==0)
{
	mysqli_query($connect, "INSERT INTO posting (Judul, Tanggal, Konten, Featured)
	VALUES ('$Judul', '$Tanggal','$Konten', '0')");

	$result = mysqli_query($connect,"SELECT * FROM posting ORDER BY ID DESC LIMIT 1");
	if($row = mysqli_fetch_array($result))
	{
		$id=$row['ID'];
	}

}
else
{
	mysqli_query($connect, "UPDATE posting SET Judul='$Judul' , Tanggal='$Tanggal' , Konten= '$Konten' WHERE ID= ". $_GET['id']." ");
	$id=$_GET['id'];

}


 mysqli_close($connect);
header("location: post.php?id=$id");

?>