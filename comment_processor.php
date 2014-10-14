<?php
//open connection to db
$db_post = mysqli_connect('localhost','root', "", 'simpleblog');

//get from param
$id = $_GET["id"];
$mode = $_GET["mode"];
if ($mode == "retrieve") {
	$query = "SELECT * FROM `commentlist` WHERE Idx_post=".$id." ORDER BY `Waktu` DESC";
	$results_comment = mysqli_query($db_post, $query);	

	foreach ($results_comment as $result)
	{
	echo "
		<li class=\"art-list-item\">
			<div class=\"art-list-item-title-and-time\">
				<h2 class=\"art-list-title\">".$result['Nama'] ."</h2> ";
					$date = date_create($result['Waktu']);
	echo "				
				<div class=\"art-list-time\">". date_format($date, 'g:ia \o\n l jS F Y') ."</div>
			</div>
			<p>".$result['Komentar'] ."</p>
		</li>
		";
	} 
} else {

	$nama = $_GET["Nama"];
	$email = $_GET["Email"];
	$komentar = $_GET["Komentar"];
	date_default_timezone_set('Asia/Jakarta'); 
	$tanggal = date("Y-m-d H:i:s");

	$query = "INSERT INTO `simpleblog`.`commentlist` (`idx_post`, `nama`, `email`, `waktu`, `komentar`) VALUES (".$id.",'$nama','$email','$tanggal','$komentar')";

	mysqli_query($db_post, $query);	
	
	$query = "UPDATE `commentlist` SET `komentar`= REPLACE (`komentar`, '\n', '<br>')";
	mysqli_query($db_post, $query);

}
	
mysqli_close($db_post);	

?>