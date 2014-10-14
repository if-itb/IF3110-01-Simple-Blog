<?php

    try {
        $db = new PDO("mysql:host=localhost;dbname=simple-blog","root","");
        $postID = $_GET['postID'];
        $query1 = "DELETE from `Posts` WHERE Post_ID='$postID'";
        $query2 = "DELETE from `Comments` WHERE Post_ID='$postID'";
        $db->exec($query1);
        $db->exec($query2);
        $db = null;
    }
    catch (PDOException $e){
        echo $e->getMessage();
    }
    
    header("Location: ../../index.php");
?>