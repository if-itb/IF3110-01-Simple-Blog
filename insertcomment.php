<?php
	include 'connection.php';
    $id = $_POST['id'];
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $komentar = mysqli_real_escape_string($con, $_POST['komentar']);

    $sql="INSERT INTO komentar (ID, Nama, Email, Komentar)
    VALUES ('$id', '$nama', '$email', '$komentar')";
    if (!mysqli_query($con,$sql)) {
      die('Error: ' . mysqli_error($con));
    }
    $result = mysqli_query($con,"SELECT * FROM komentar WHERE ID=$id ORDER BY Waktu ASC");
    while($key = mysqli_fetch_array($result)){    

    echo '   <li class="art-list-item">
            <div class="art-list-item-title-and-time">
                <h2 class="art-list-title">'.$key['Nama'].'</h2>
                <div class="art-list-time">'.$key['Waktu'].'</div>
            </div>
            <p>'.$key['Komentar'].'</p>
        </li>';
    }
?>