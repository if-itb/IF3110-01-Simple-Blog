<?php
require_once('config.php');

$Nama = $_GET['nama'];
$Komentar = $_GET['komentar'];
$Email = $_GET['email'];
$id = $_GET['id'];

//masukkan ke database
$stmt = $db->prepare('INSERT INTO komentar (kom_nama,kom_waktu, kom_email, kom_isi, post_id_fk) VALUES (:Nama, :Waktu, :Email, :Isi, :post_id)') ;
$stmt->execute(array(
    ':Nama' => $Nama,
    ':Waktu' => date('Y-m-d h:i:s', time()),
    ':Email' => $Email,
    ':Isi' => $Komentar,
    ':post_id' => $id
));

//menampilkan komentar dari database
try{
    $stmt = $db->query("SELECT * FROM `komentar` WHERE post_id_fk = ".$id." ORDER BY kom_waktu DESC");
    //$stmt->execute(array(post_id => $_GET['id'])); echo post_id;
    while($row = $stmt->fetch()){  
        echo '<li class="art-list-item">';
            echo '<div class="art-list-item-title-and-time">';
                echo '<h2 class="art-list-title"><a href="post.php?id='.$id.'">'.$row['kom_nama'].'</a></h2>';
                echo '<div class="art-list-time">'.$row['kom_waktu'].'</div>';
            echo '</div>';
            echo '<p>'.$row['kom_isi'].'</p>';
        echo '</li>';
    }
} catch(PDOException $e){
    echo $e->getMessage();
}

?>