<?php
    
    include 'function.php';
    $idpost = $_GET['id'];
    
$dbconnection = get_con_mysqli();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $query = "SELECT nama, tanggal, komentar FROM komentar 
                    WHERE idpost = '$idpost' 
                    ORDER BY YEAR(tanggal) DESC, MONTH(tanggal) DESC,
                    DAY(tanggal) DESC";
        $result = mysqli_query ($dbconnection, $query);
        if(!$result){
            die('Could not get query: '.mysql_error());
        }
        
        while ($row = mysqli_fetch_array($result))
        {
            $nama = $row['nama'];
            $tanggal = $row['tanggal'];
            $komentar = $row['komentar'];
            
            echo '<li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title"><a href="post.html?id='.$idpost.'">'.$nama.'</a></h2>
                        <div class="art-list-time">'.time_ago($tanggal).'</div>
                    </div>
                    <p>'.$komentar.' &hellip;</p>
                </li>';
        }
?>