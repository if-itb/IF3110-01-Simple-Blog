<?php

function add_post($judul,$tanggal,$konten){
	$judul = mysql_real_escape_string($judul);
	$tanggal = mysql_real_escape_string($tanggal);
	$konten = mysql_real_escape_string($konten);
	$query = "INSERT INTO `post` SET 
	`judul`='{$judul}',
	`tanggal`='{$tanggal}',
	`konten`='{$konten}'";
	mysql_query($query);
}

function get_posts($id=null){
	$posts = array();
	$query = "SELECT `id`,`judul`,DATE_FORMAT(`tanggal`,'%d %M %Y') AS `tanggal`,`konten` FROM `post` ORDER BY `id` DESC";
	$query = mysql_query($query);

	while($row = mysql_fetch_assoc($query)){
		$posts[]=$row;
	}

	return $posts;
}

function show_post($id=null){
	$posts = array();
	$query = "SELECT `id`,`judul`,DATE_FORMAT(`tanggal`,'%d %M %Y') AS `tanggal`,`konten` FROM `post`";

	if(isset($id)){
		$id = (int) $id;
		$query .= " WHERE `id` = '{$id}'";
	}

	$query = mysql_query($query);

	while($row = mysql_fetch_assoc($query)){
		$posts[]=$row;
	}
	return $posts;

}


function edit_post($judul,$tanggal,$konten,$id){
	$judul = mysql_real_escape_string($judul);
	$tanggal = mysql_real_escape_string($tanggal);
	$konten = mysql_real_escape_string($konten);
	$id = (int) $id;
	$query = "UPDATE `post` SET 
	`judul`='{$judul}',
	`tanggal`='{$tanggal}',
	`konten`='{$konten}' 
	WHERE `id` = '{$id}'";
	mysql_query($query);

}

function delete_post($id=null){
	if(isset($id)){
		$id = (int) $id;
		$query = "DELETE FROM `post` where `id` = '{$id}'";
	}
	mysql_query($query);
}

function add_comment($post_id,$nama,$email,$isi){
	$post_id = (int) $post_id;
	$nama = mysql_real_escape_string($nama);
	$email = mysql_real_escape_string($email);
	$isi = mysql_real_escape_string($isi);
	$query = "INSERT INTO `komentar` SET `post_id`='{$post_id}',`nama`='{$nama}',`email`='{$email}',`isi`='{$isi}',`tanggal`=NOW()";
	mysql_query($query);
}

function get_comments($post_id=null){
	$comments = array();
	$query = "SELECT `id`,`post_id`,`nama`,`email`,`isi`,DATE_FORMAT(`tanggal`,'%d %M %Y - %H:%i:%s') as `tanggal` FROM `komentar` WHERE `post_id` = '{$post_id}' ORDER BY `id` DESC";
	$query = mysql_query($query);

	while($row = mysql_fetch_assoc($query)){
		$comments[]=$row;
	}

	return $comments;
}
?>