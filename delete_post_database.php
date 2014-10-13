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
   
   if(isset($_GET['delete_id'])){
      $deleteArticleQuery = "DELETE FROM article WHERE article_id = :delete_id";
      $queryHandler = $databaseHandler->prepare($deleteArticleQuery);
      $queryHandler->bindParam(':delete_id',$_GET['delete_id'],PDO::PARAM_INT);
      $queryHandler->execute();
   }
   
   #Close connection
   $databaseHandler = null;
   
   #Redirect
   header("Location: index.php");
   die();
   
}catch(PDOException $e){
   echo "Sorry, there is a problem now. Please come again later";
   file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
}
?>