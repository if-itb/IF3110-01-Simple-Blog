<?php
echo "paling atas";


$host = "localhost";
$username = "root";
$password = "";
$database = "simple_blog";
$con = mysql_connect($host,$username,$password);

if (!$con){
	echo "db connection error";
	throw new Exception("Database connection error");
} else {
	mysql_select_db($database,$con);
}

echo "Sebelom masu IF";

if(isset($_POST)){
	echo "Sudah masuh IF";
	$judul = $_POST['Judul'];
	$tanggal = $_POST['Tanggal'];
	$konten = $_POST['Konten'];

	echo "Sebelom nulis querry";

	$sql = "INSERT INTO `tb_post`(`post_title`,`post_date`,`post_content`) VALUES ('$judul','$tanggal','$konten')";	
	
	echo "sebelum eksekusi querry";
	mysql_query($sql);

	echo "Sebelum redirect";
	header("Location: index.php");
	echo "Sesudah redirect";

	
}else{
	echo "Nggak jalan bro";
}

?>
