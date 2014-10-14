<?php

include "db-connector.php";
$iPost = $_GET['iPost'];

$nama = $_GET['nama'];
$email = $_GET['email'];
$komentar = $_GET['komentar'];
$tanggal = date("Y-m-d");

$query_insert = "INSERT INTO post_comment
					(post_id, nama, email, komen, tanggal)
					VALUES ('$iPost','$nama', '$email' , '$komentar','$tanggal')"; 

mysql_select_db("db_simpleblog");
$retval = mysql_query($query_insert,$db);
if(! $retval){
		die("Could not enter data : " . mysql_error());
}else {

}

 $query_getAll = "select * from post_comment WHERE post_id = $iPost ORDER BY comment_id DESC";
 $hasil_getAll = mysql_query($query_getAll,$db) or die(mysql_error());
while($row = mysql_fetch_array($hasil_getAll))
        {
            echo '<ul class="art-list-body">';
                echo '<li class="art-list-item">';
                    echo '<div class="art-list-item-title-and-time">';
                        echo '<h2 class="art-list-title"><a href="post.php">';
                            // nama yang komen
                        echo $row['nama'];
                        echo '</a></h2>';
                        echo '<div class="art-list-time">';
                            // waktu komen 
                        echo $row['tanggal'];
                        echo '</div>';
                    echo '</div>';
                            // isi komen
                    echo $row['komen'];
                echo '</li>';
            echo '</ul>';
        }

?>