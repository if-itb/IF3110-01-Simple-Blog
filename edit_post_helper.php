<?php



$host = "localhost";
$username = "root";
$password = "";
$database = "simple_blog";
$con = mysql_connect($host,$username,$password);

if (!$con){
	
	throw new Exception("Database connection error");
} else {
	mysql_select_db($database,$con);
}



if(isset($_POST)){

	$judul = $_POST['Judul'];
	$tanggal = $_POST['Tanggal'];
	$konten = $_POST['Konten'];
	$id = $_POST['Id'];

	//$sql = "INSERT INTO `tb_post`(`post_title`,`post_date`,`post_content`) VALUES ('$judul','$tanggal','$konten')";	
	$sql = "UPDATE `simple_blog`.`tb_post` SET `post_title` = '$judul', `post_date` = '$tanggal', `post_content` = '$konten' WHERE `tb_post`.`post_id` = $id;";
	
	//$sql = "UPDATE `tb_post` SET `post_date` = '$tanggal', `post_title` = '$judul', `post_content` = '$konten' WHERE `post_id` = $id;";
	
	
	
	mysql_query($sql);

	
	header("Location: index.php");
	

	
}else{
	echo "Nggak jalan bro";
}

?>
