<?PHP
include("db_con.php");

$table = "posts";

$sql = "DELETE FROM $table WHERE id_post = '$_GET[id]'";

$query = @mysql_query($sql);

include("index.php");
?>