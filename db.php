<?php
$host = "localhost";
$username = "kuliah";
$password = "kuliah";
$database = "simple_blog";
$con = mysql_connect($host,$username,$password);

if (!$con){
	throw new Exception("Database connection error");
} else {
	mysql_select_db($database,$con);
}

function getPosts($page = null){
	//$page = mysql_real_escape_string($page);
	$sql = "SELECT * FROM `post` ORDER BY `id` DESC";
	$resource = mysql_query($sql);
	$result = array();
	while ($row = mysql_fetch_array($resource)){
		array_push($result,$row);
	}
	return $result;
}

function getComments($post_id){
	//$post_id = mysql_real_escape_string($post_id);
	$sql = "SELECT * FROM `comment` WHERE `post_id`=$post_id";
	$resource = mysql_query($sql);
	$result = array();
	while ($row = mysql_fetch_array($resource)){
		array_push($result, $row);
	}
	return $result;
}

function setPost($data){
	//var_dump($data);
	if ($data['id'] == 0){
		$sql = "INSERT INTO `post`(`judul`,`tanggal`,`konten`) VALUES ('".$data['judul']."','".$data['tanggal']."','".$data['konten']."')";	
	} else {
		$sql = "UPDATE `post` SET `judul` = '".$data['judul']."',`tanggal` = '".$data['tanggal']."',`konten` = '".$data['konten']."' WHERE `id`=".$data['id'];
	}
	//die("here");
	//echo $sql;
	mysql_query($sql);
	//die("here");
}

function getPost($id){
	$sql = "SELECT * FROM `post` WHERE `id` = $id";
	$resource = mysql_query($sql);
	while($row = mysql_fetch_array($resource)){
		return $row;
	}
}

function addComment($data){
	$email = $data['email']; $post_id = $data['post_id']; $komentar = $data['komentar']; $nama = $data['nama'];
	$sql = "INSERT INTO `comment`(`post_id`,`nama`,`komentar`,`email`) VALUES ('$post_id','$nama','$komentar','$email') ";
	mysql_query($sql);
}

?>
