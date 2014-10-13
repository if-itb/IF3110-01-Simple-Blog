<?php
  include 'connection.php';
  $id = $_GET['var'];
  $result = mysqli_query($con,"SELECT * FROM komentar WHERE ID=$id ORDER BY Waktu ASC");
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
?>