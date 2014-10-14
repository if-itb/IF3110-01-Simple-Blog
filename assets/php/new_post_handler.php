<?php
    require("posts.inc");
    
    try {
        $db = new PDO("mysql:host=localhost;dbname=simple-blog","root","");
        
        $posts = new Posts($_POST['Judul'],$_POST['Year']."-".$_POST['Month']."-".$_POST['Date'],$_POST['Konten']);
        $query = "INSERT into `Posts` (Title, Date, Content) VALUES ('".$posts->getTitle()."',
        '".$posts->getDate()."','".$posts->getContent()."')";
        
        $db->exec($query);
        
        $db = null;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    header("Location: ../../index.php");

?>