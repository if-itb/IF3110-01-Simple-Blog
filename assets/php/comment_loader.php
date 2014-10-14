<?php
    $postID = $_REQUEST["postID"];
    
    try{
        $db = new PDO("mysql:host=localhost;dbname=simple-blog","root","");
        $query = "SELECT * FROM `Comments` WHERE Post_ID='".$postID."'";
            foreach($db->query($query) as $row){
                echo "<li class=\"art-list-item\">";
                echo     "<div class=\"art-list-item-title-and-time\">";
                echo         "<h2 class=\"art-list-title\"><a href=\"post.html\">".$row['Name']."</a></h2>";
                echo      "<div class=\"art-list-time\">".$row['Date']."</div>";
                echo      "</div>";
                echo      "<p>".$row['Comment']."</p>";
                echo  "</li>";
            }

        $db = null;
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
    
?>