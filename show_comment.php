<?php
try{
   #Connect to MySQL
   $host = "localhost";
   $dbname = "simple_blog";
   $user = "root";
   $pass = "";
   $databaseHandler = new PDO("mysql:host=$host;dbname=$dbname;",$user,$pass);
   $databaseHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
   #Query
   if(isset($_GET['Kode'])){
      $get_all_comment = "SELECT * FROM comment WHERE article_id = :id_a ORDER BY comment_id DESC";
      $queryHandler = $databaseHandler->prepare($get_all_comment);
      $queryHandler->bindParam(':id_a',$_GET['Kode'],PDO::PARAM_INT);
      $queryHandler->execute();
      
      $queryHandler->setFetchMode(PDO::FETCH_ASSOC);
      
      while($com = $queryHandler->fetch()){
         $date_show = date("j F Y",strtotime($com['comment_date']));
         echo"
                            <li class=\"art-list-item\">
                                   <div class=\"art-list-item-title-and-time\">
                                       <h2 class=\"art-list-title\">$com[comment_name]</h2>
                                       <div class=\"art-list-time\">$date_show</div>
                                   </div>
                                   <p>$com[comment_content]</p>
                               </li>";
      }
   
   }
   

   #Close connection
   $databaseHandler = null;
   
}catch(PDOException $e){
   file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
}
?>