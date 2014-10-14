<?php
include "connect.php";
//session_start();
$id=$_POST['id']; 
$nama=clean($_POST['nama']);
$email=$_POST['email'];
$komentar=clean($_POST['komentar']);

$sql="INSERT INTO `komentar_post` (`nama`, `email`, `tanggal_kom`, `komentar`, `id`) VALUES ('$nama', '$email', CURRENT_TIMESTAMP, '$komentar', '$id')";


if (!mysql_query($sql)) {
  die('Error: ' . mysql_error($con));
}

function clean($data)
{
	$data= trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$comment='<li class="art-list-item"><div class="art-list-item-title-and-time"><h2 class="art-list-title"><a href="#">'.$nama.'</a></h2></div><p>'.$komentar.'</p>';
//echo $comment;
				echo '<li class="art-list-item">';
				echo 	'<div class="art-list-item-title-and-time">';
				echo		'<h2 class="art-list-title"><a href="#">'.$nama.'</a></h2>';
				//echo		'<div class="art-list-time">'.$comment['tanggal'].'</div>';
				echo	'</div>';
				echo	'<p>'.$komentar.'</p>';
//mysql_query($sql);
//header ('Location: index.php');
?>