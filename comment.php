<?php
  include 'connection.php';
  $id = $_GET['var'];
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