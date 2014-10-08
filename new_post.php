<?php require 'config.php'; ?>

<?php 
  if (isset($_GET['id'])) { 
    include 'db.php';
    
    $id = (int) $_GET['id'];   
    $query = "SELECT * FROM `posts` WHERE `post_id` = '$id'";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
      $row = mysqli_fetch_array($result); 
    }
  }
?>

<!DOCTYPE html>
<html>
<head>

  <?php $title = 'Simple Blog | Tambah Post'; ?>
  <?php include 'templates/head.php'; ?>

</head>

<body class="default">
<div class="wrapper">

  <?php include 'templates/header.php'; ?>

  <article class="art simple post">
          
    <h2 class="art-title">-</h2>

    <div class="art-body">
      <div class="art-body-inner">
        <h2>Tambah Post</h2>

        <div id="contact-area">
          <form method="post" action="save_post.php">
            <input type="hidden" name="id" id="id" value="<?php echo isset($row) ? $row['post_id'] : '' ?>" id="EditMode">

            <label for="Judul">Judul:</label>
            <input type="text" name="Judul" id="Judul" value="<?php echo isset($row) ? $row['post_title'] : ''; ?>">

            <label for="Tanggal">Tanggal:</label>
            <input type="text" name="Tanggal" id="Tanggal" value="<?php echo isset($row) ? $row['post_date'] : ''; ?>">
            
            <label for="Konten">Konten:</label><br>
            <textarea name="Konten" rows="20" cols="20" id="Konten"><?php echo isset($row) ? $row['post_content'] : ''; ?></textarea>

            <input type="submit" name="submit" value="Simpan" class="submit-button">
          </form>
        </div>
      </div>
    </div>

  </article>

  <?php include 'templates/footer.php'; ?>

</div>

<?php include 'templates/foot.php'; ?>

</body>
</html>