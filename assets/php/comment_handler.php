<?php
    $name= $_REQUEST["name"];
    $comment = $_REQUEST["comment"];
    $email = $_REQUEST["email"];
    $postID = $_REQUEST["postID"];
    
    date_default_timezone_set('Indonesia/Jakarta');
    $date = date("Y-m-d");
    echo $date;
    
    try{
        $db = new PDO("mysql:host=localhost;dbname=simple-blog","root","");
        
        $db->exec("INSERT into `Comments` (Name,Comment,Email,Post_ID,Date) VALUES ('$name','$comment','$email','$postID','$date')");
        $db = null;
    }
    catch (PDOException $e){
        echo $e->getMessage();
    }
?>