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
   if(isset($_POST['Nama']) && isset($_POST['Email']) && isset($_POST['Komentar']) && isset($_POST['Kode'])){
      $get_last_comment = "(SELECT comment_id FROM comment WHERE article_id = :a_id ORDER BY comment_id DESC LIMIT 1 );";
      $queryHandler = $databaseHandler->prepare($get_last_comment);
      $queryHandler->bindParam(':a_id',$_POST['Kode'],PDO::PARAM_INT);
      $queryHandler->execute();

      $queryHandler->setFetchMode(PDO::FETCH_ASSOC);
      if($last = $queryHandler->fetch())
         $last_id = $last['comment_id']+1;
      else
         $last_id = 1;
      
      $insert_comment = "INSERT INTO comment (article_id, comment_id, comment_name, comment_email, comment_date, comment_content) VALUES (:a,:b,:c,:d,:e,:f)";
      $tanggal = date("Y-m-d");
      $queryHandler = $databaseHandler->prepare($insert_comment);
      $queryHandler->bindParam(":a",$_POST['Kode']);
      $queryHandler->bindParam(":b",$last_id);
      $queryHandler->bindParam(":c",$_POST['Nama']);
      $queryHandler->bindParam(":d",$_POST['Email']);
      $queryHandler->bindParam(":e",$tanggal);
      $queryHandler->bindParam(":f",$_POST['Komentar']);
      $queryHandler->execute();
   }
   
   
   #Close connection
   $databaseHandler = null;
   
}catch(PDOException $e){
   file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
}
?>