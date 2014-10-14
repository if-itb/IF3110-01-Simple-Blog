<?php
if (isset($_GET['action']) && ($_GET['action'] == 'delete') && isset($_GET['id_post'])) {
	$host     = "localhost";
    $username = "root";
    $password = "";
    $dbname   = "if3110-01";

    $conection = mysqli_connect($host,$username,$password,$dbname);
    $query  = "DELETE from post where id_post=".$_GET['id_post'];
    mysqli_query($conection, $query);
    mysqli_close($conection);
    header('Location: http://localhost/if3110-01-Simple-blog/index.php');
}
?>