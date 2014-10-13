<?php
    $con=mysqli_connect("localhost","root","","list_post");
    $list_komentar = mysqli_query($con,"SELECT * FROM komentar WHERE id_post = '".$_GET["id"]."'ORDER BY Tanggal DESC");
    while($row=mysqli_fetch_array($list_komentar)) {
        echo '<li class="art-list-item">
            <div class="art-list-item-title-and-time">
                <h2 class="art-list-title">'.$row['Nama'].'</a></h2>
                <div class="art-list-time">'.$row['Tanggal'].'</div>
            </div>
            <p>'.$row['Konten'].'</p>
        </li>';
    }
    mysqli_close($con);
?>