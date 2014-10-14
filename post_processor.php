<?php
//open connection to db
$db_post = mysqli_connect('localhost','root', "", 'simpleblog');

$judul = mysqli_real_escape_string($db_post, $_POST['Judul']);
$tanggal_input = strtotime(trim($_POST['Tanggal']));
$tanggal = date("Y-m-d", $tanggal_input);
$konten = mysqli_real_escape_string($db_post, $_POST['Konten']);

if(isset($_POST['id'])) {
	$id = $_POST['id'];
	$isUpdate = true;
} else {
	$isUpdate = false;
}

if(!$isUpdate) {
	//new post
	$query = "INSERT INTO `simpleblog`.`listpost` (`judul`, `tanggal`, `konten`) VALUES ('$judul', '$tanggal', '$konten')";
} else {
	//edit post
	$query = "UPDATE `listpost` SET `judul`='$judul',`tanggal`='$tanggal',`konten`='$konten' WHERE Idx = $id";
}
mysqli_query($db_post, $query);
$query = "UPDATE `listpost` SET `konten`= REPLACE (`konten`, '\n', '<br>')";
mysqli_query($db_post, $query);


mysqli_close($db_post);	

header('Location: index.php');
?>