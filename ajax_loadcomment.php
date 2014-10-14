<?php
if(isset($_GET['id_post'])){
	$host     = "localhost";
    $username = "root";
    $password = "";
    $dbname   = "if3110-01";

    $conection = mysqli_connect($host,$username,$password,$dbname);
    $query  = "SELECT * from komentar where id_post=".$_GET['id_post'];
	$result = mysqli_query($conection,$query);
    $json = array();
    while ($row = mysqli_fetch_array($result)) {
    	$json[] = array(
					'id_komentar' => $row['id_komentar'], 
					'nama'        => $row['nama'], 
					'email'       => $row['email'], 
					'waktu'       => $row['waktu'], 
					'konten'      => $row['konten'], 
    			);
    }
    echo json_encode($json);
}
?>