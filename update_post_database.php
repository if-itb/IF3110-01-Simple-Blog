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
      if(isset($_POST['Judul']) && isset($_POST['Tanggal']) && isset($_POST['Konten']) && isset($_POST['Kode'])){
         $insertArticleQuery = "UPDATE article SET article_date = :date, article_title = :title, article_content = :content WHERE article_id = :kode";
         $changedDate = strtotime(trim($_POST['Tanggal']));
         $changedDateFormat = date("Y-m-d", $changedDate);
         $articleHandler = $databaseHandler->prepare($insertArticleQuery);
         $articleHandler->bindParam(':title',$_POST['Judul'],PDO::PARAM_STR,50);
         $articleHandler->bindParam(':date',$changedDateFormat);
         $articleHandler->bindParam(':content',$_POST['Konten'],PDO::PARAM_STR,5000);
         $articleHandler->bindParam(':kode',$_POST['Kode'],PDO::PARAM_INT);
         $articleHandler->execute();
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