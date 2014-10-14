<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "simple_blog";
$con = mysql_connect($host,$username,$password);

$action = "";

if (!$con){
	throw new Exception("Database connection error");
} else {
	mysql_select_db($database,$con);
}

function getPosts($page = null){
	$sql = "SELECT * FROM `tb_post` ORDER BY `post_id` DESC";
	$resource = mysql_query($sql);
	$result = array();
	while ($row = mysql_fetch_array($resource)){
		array_push($result,$row);
	}
	return $result;
}

function getPost($post_id){
	$sql = "SELECT * FROM `tb_post` WHERE `post_id` = $post_id";
	$resource = mysql_query($sql);
	while($row = mysql_fetch_array($resource)){
		return $row;
	}
}

function getComments($post_id){
	$sql = "SELECT * FROM `tb_comments` WHERE `post_id`=$post_id ORDER BY cmt_id DESC";
	$resource = mysql_query($sql);
	$result = array();
	while ($row = mysql_fetch_array($resource)){
		array_push($result, $row);
	}
	return $result;
}

function addComment($data){
	$post_id = $data['post_id']; 
	$nama = $data['name'];
	$email = $data['email']; 
	$komentar = $data['post_comment']; 
	$sql = "INSERT INTO `tb_comments`(`post_id`,`name`,`email`,`post_comment`) VALUES ('$post_id','$nama','$email','$komentar') ";
	mysql_query($sql);
}


?>



