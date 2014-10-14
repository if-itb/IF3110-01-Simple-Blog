<?php
    require("posts.inc");
    
    try{
        $db = new PDO("mysql:host=localhost;dbname=simple-blog","root","");
        
         $posts = new Posts($_POST['Judul'],$_POST['Year']."-"
                    .$_POST['Month']."-".$_POST['Date'],$_POST['Konten']);
        $query = "UPDATE `Posts` SET Title='".$posts->getTitle()."', Date='".$posts->getDate()."',
            Content='".$posts->getContent()."' WHERE Post_ID='".$_GET['PostID']."'";
            
        $db->exec($query);
        
        $db = null;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    
    header("Location: ../../index.php");

?>