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
            echo 	'<h2 class="art-list-title"><a href="post.php?id='.$id.'">'.$judul.'</a></h2>';    
            echo 	'<div class="art-list-time">'.$tanggal.'</div>';   
            echo    	'<div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>';
            echo '</div>';
            echo '<p>'.$konten.'</p>';
            echo '<p><a href="edit_post.php?id='.$id.'">Edit</a> | <button type="button" onclick="Confirm_Delete('.$id.')">Hapus</button></p>';
           echo '</li>';
        }
        close_connection($dbconnection);
    }

    function Get_One_Article($id)
    {
        $dbconnection = get_con_mysqli();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $query = "SELECT * FROM post 
                    WHERE id = '$id'";
        $result = mysqli_query ($dbconnection, $query);
        if(!$result){
            die('Could not get query: '.mysql_error());
        }
        
        while ($row = mysqli_fetch_array($result))
        {
            $judul = $row['judul'];
            $tanggal = $row['tanggal'];
            $konten = $row['konten'];
        }
        
        //Menampilkan form
        echo '<form method="post" action="new_post.php">';
        echo    '<label for="Judul">Judul:</label>';
        echo    '<input type="text" name="Judul" id="Judul" value="'.$judul.'"> </input>';
        echo    '<label for="Tanggal">Tanggal:</label>';
        echo    '<input type="date" name="Tanggal" id="Tanggal"> </input>';
        echo    '<label for="Konten">Konten:</label><br>';
        echo    '<textarea name="Konten" rows="20" cols="20" id="Konten">'.$konten.'</textarea>';

        echo    '<input type="submit" name="submit" value="Simpan" class="submit-button"> </input>';
        echo '</form>';
        
        close_connection($con);
    }

    function Hapus_Post($id)
    {
        $dbconnection = get_con_mysqli();
        $query = 'DELETE FROM post WHERE id = '.$id;
        //echo $id,$query;
        mysqli_query($dbconnection, $query);
        close_connection($dbconnection);
    }

    function Show_Post($id)
    {
        $dbconnection = get_con_mysqli();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $query = "SELECT * FROM post 
                    WHERE id = '$id'";
        $result = mysqli_query ($dbconnection, $query);
        if(!$result){
            die('Could not get query: '.mysql_error());
        }
        
        while ($row = mysqli_fetch_array($result))
        {
            $judul = $row['judul'];
            $tanggal = $row['tanggal'];
            $konten = $row['konten'];
        }
  
        echo 	'<header class="art-header">';
        echo 	   '<div class="art-header-inner" style="margin-top: 0px; opacity: 1;">';
        echo    	'  <time class="art-time">'.$tanggal.'</time>';
        echo    	'    <h2 class="art-title">'.$judul.'</h2>';
        echo    	'   <p class="art-subtitle"></p>';
        echo    	'</div>';
        echo 	'</header>';

	    echo 	'<div class="art-body">';
	    echo 	'    <div class="art-body-inner">';
	    echo 	'       <hr class="featured-article" />';
	    echo 	'        <p>'.$konten.'</p>';

	    echo 	'        <hr />';
    }
    
    function add_comment($id, $nama, $email, $komentar, $tanggal)
    {
        $con=get_con_mysqli();
        //echo $komentar;
        // Check connection
        if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $tanggal = date($tanggal);
        
        mysqli_query($con,"INSERT INTO komentar (id, nama, email, tanggal, komentar)
                            VALUES ('$id','$nama','$email', '$tanggal','$komentar')");
    
        close_connection($con);
    }
?>