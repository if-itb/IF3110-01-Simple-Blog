<?PHP
include("db_con.php");

$table = "comments";

if(!empty($_POST)){
	$sql			= "INSERT INTO $table SET
	id_post			= '$_POST[ID]',
	nama			= '$_POST[Nama]',
	email			= '$_POST[Email]',
	isi_komentar	= '$_POST[Komentar]'";
}

$query	= @mysql_query($sql);

?>