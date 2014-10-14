<?php
;


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



if(isset($_POST)){
	
	$judul = $_POST['Judul'];
	$tanggal = $_POST['Tanggal'];
	$konten = $_POST['Konten'];

	

	$sql = "INSERT INTO `tb_post`(`post_title`,`post_date`,`post_content`) VALUES ('$judul','$tanggal','$konten')";	
	
	
	mysql_query($sql);

	
	header("Location: index.php");
	

	
}else{
	echo "Nggak jalan bro";
}

?>
