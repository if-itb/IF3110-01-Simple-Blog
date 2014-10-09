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
      
      if(isset($_POST['Judul']) && isset($_POST['Tanggal']) && isset($_POST['Konten'])){
         $insertArticleQuery = "INSERT INTO article (article_title, article_date, article_content) VALUES (:title,:date,:content)";
         $articleHandler = $databaseHandler->prepare($insertArticleQuery);
         $articleHandler->bindParam(':title',$_POST['Judul'],PDO::PARAM_STR,50);
         $articleHandler->bindParam(':date',$_POST['Tanggal']);
         $articleHandler->bindParam(':content',$_POST['Konten'],PDO::PARAM_STR,5000);
         $articleHandler->execute();
      }
      
      #Close connection
      $databaseHandler = null;
   }catch(PDOException $e){
      echo "Sorry, there is a problem now. Please come again later";
      file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
   }
?>