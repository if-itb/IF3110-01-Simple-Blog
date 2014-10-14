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
    
    function Edit_Post($idpost, $judul, $tanggal, $konten)
    {
        $con=get_con_mysqli();
        // Check connection
        if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $tanggal = date($tanggal);
        mysqli_query($con,"UPDATE post 
                    SET judul = '$judul', 
                        tanggal = '$tanggal',
                        konten = '$konten'
                    WHERE id = '$idpost'");
    
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
            echo '<p>'.substr($konten,0,300).'</p>';
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
        echo    '<form method="post" action="edit_post_call_function.php?id='.$id.'">';
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
    
    function add_comment($id, $nama, $email, $komentar)
    {
        $con=get_con_mysqli();
        if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        mysqli_query($con,"INSERT INTO komentar (idpost, nama, email, tanggal, komentar)
                            VALUES ('$id','$nama','$email', now(),'$komentar')");
    
        close_connection($con);
    }
    
    function load_comment($idpost)
    {
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
    }

    function time_ago($date,$granularity=2) {
    date_default_timezone_set("UTC+07:00");
    $date = strtotime($date);
    $difference = time() - $date;
    $periods = array('decade' => 315360000,
        'year' => 31536000,
        'month' => 2628000,
        'week' => 604800, 
        'day' => 86400,
        'hour' => 3600,
        'minute' => 60,
        'second' => 1);
    if ($difference < 5) {
        $retval = "posted just now";
        return $retval;
    } else {                            
        foreach ($periods as $key => $value) {
            if ($difference >= $value) {
                $time = floor($difference/$value);
                $difference %= $value;
                $retval .= ($retval ? ' ' : '').$time.' ';
                $retval .= (($time > 1) ? $key.'s' : $key);
                $granularity--;
            }
            if ($granularity == '0') { break; }
        }
        return $retval.' yang lalu';      
    }
}
?>
