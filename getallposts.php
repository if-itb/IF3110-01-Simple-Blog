<?PHP
include "db_con.php";

$table 	= "posts"; 

if(isset($_GET['id'])){
$sql 	= "SELECT * FROM $table WHERE id_post = '$_GET[id]'";
$result	= @mysql_query($sql);
$row	= @mysql_fetch_array($result);
}
?>