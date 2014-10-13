<?php
function connectdb(){
$con = mysql_connect("localhost","root","");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	$db_selected = mysql_select_db('simple_blog', $con);
	if (!$db_selected) {
		die ('Can\'t use db simple_blog ' . mysql_error());
	}
	return $con;
}

function updatedb($judul,$tanggal,$konten){
	$sql_statement = "INSERT INTO `data_post`(`Judul`,`Tanggal`,`Konten`) VALUES ('$judul','$tanggal','$konten')";
	$con = connectdb();
	$Success = mysql_query($sql_statement,$con);
	mysql_close($con);
	return $Success;
}

function deletepost($id){
	$sql_statement = "DELETE FROM `data_post` WHERE ID_Post=$id";
	$con = connectdb();
	$Success = mysql_query($sql_statement,$con);
	mysql_close($con);
	return $Success;
}

function updatekomentar($nama,$datetime,$email,$komentar,$id_post) {
	$sql_statement = "INSERT INTO `data_komen`(`Nama`,`Tanggal`,`Email`,`Komentar`,'ID_Post`) VALUES ('$nama','$datetime','$email','$komentar','$id_post')";
	$con = connectdb();
	$Success = mysql_query($sql_statement,$con);
	mysql_close($con);
	return $Success;
}

?>