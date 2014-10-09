<?php
    include 'database_config.php';

    function New_Post($judul, $tanggal, $konten)
    {

        $con=get_con_mysqli();
        // Check connection
        if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $tanggal = date($tanggal);
        mysqli_query($con,"INSERT INTO post (judul, tanggal, konten)
                            VALUES ('$judul', '$tanggal','$konten')");
    
        close_connection($con);
    }
    
    function Load_All_Article()
    {
        //Load artikel
        $dbconnection = get_con_mysqli();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $query = 'SELECT * FROM post 
                    ORDER BY YEAR(tanggal) DESC, MONTH(tanggal) DESC, DAY(tanggal) DESC';
        $result = mysqli_query ($dbconnection, $query);
        if(!$result){
            die('Could not get query: '.mysql_error());
        }
        while ($row = mysqli_fetch_array($result))
        {
            $id = $row['id'];
            $judul = $row['judul'];
            $tanggal = $row['tanggal'];
            $konten = $row['konten'];
            echo '<li class="art-list-item">';
            echo '<div class="art-list-item-title-and-time">';
            echo 	'<h2 class="art-list-title"><a href="post.html">',$judul,'</a></h2>';    
            echo 	'<div class="art-list-time">',$tanggal,'</div>';   
            echo    	'<div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>';
            echo '</div>';
            echo '<p>',$konten,'</p>';
            echo '<p><a href="edit_post.php?id=',$id,'">Edit</a> | <a href="hapus_post.php?id=',$id,'">Hapus</a></p>';
           echo '</li>';
        }
        close_connection($dbconnection);
    }
?>