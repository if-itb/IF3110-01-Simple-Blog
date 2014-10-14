<?php
    require 'database.php';
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM post WHERE id = $id";
        $q = $pdo->prepare($sql);
        $q->execute();
        Database::disconnect();
        header("Location: index.php");
         
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
 
<body>
    
    <div class="container">
    <h2>Hapus Post</h2>  
        <form action="delete.php" method="post">
          <input type="hidden" name="id" value="<?php echo $id;?>"/>
          <p>Apakah Anda yakin menghapus post tersebut?</p>
              <button class="btn btn-danger" type="submit">Ya</button>
              <a href="index.php">Tidak</a>
        </form>
    </div>

</body>
</html>
