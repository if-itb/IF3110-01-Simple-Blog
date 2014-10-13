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
    else {
        $result = mysqli_query($con,"SELECT * FROM komentar WHERE ID=$id ORDER BY Waktu DESC LIMIT 1");
        while($key = mysqli_fetch_array($result)){    
        ?>
            <li class="art-list-item">
                <div class="art-list-item-title-and-time">
                    <h2 class="art-list-title"><?php echo $key['Nama'] ?></h2>
                    <div class="art-list-time"><?php echo $key['Waktu'] ;?></div>
                </div>
                <p><?php echo $key['Komentar'] ?></p>
            </li>
        <?php
          }
    }
?>