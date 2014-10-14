<?PHP
include("db_con.php");

$table = "posts";

if(empty($_GET['querytype']) && !empty($_POST)){
	$sql 		 = "INSERT INTO $table SET 
	judul_post   = '$_POST[Judul]',
	tanggal_post = '$_POST[Tanggal]',
	konten_post  = '$_POST[Konten]'";
}

if($_GET['querytype'] == 1 && !empty($_POST)){
	$sql 		 = "UPDATE $table SET 
	judul_post   = '$_POST[Judul]',
	tanggal_post = '$_POST[Tanggal]',
	konten_post  = '$_POST[Konten]' WHERE
	id_post		 = '$_GET[id]'";
}

$query	= @mysql_query($sql);

include("index.php");
?>