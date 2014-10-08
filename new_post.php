<?php require 'system/config.php'; ?>

<?php 
  include 'system/db.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysql_real_escape_string($_POST['Judul']);
    $datetime = new DateTime($_POST['Tanggal']);
    $datetime = $datetime->format('Y-m-d H:i:s');
    $content = mysql_real_escape_string($_POST['Konten']);
      
    if ($_POST['id'] == '') {
      $query = "INSERT INTO `posts` (post_title, post_date, post_content) VALUES ('$title', '$datetime', '$content')";
    } else {
      $id = (int) $_POST['id'];
      $query = "UPDATE `posts` SET `post_title`='$title',`post_date`='$datetime',`post_content`='$content' WHERE `post_id`='$id'";
    }
    mysqli_query($conn, $query);
    
    header("Location: ". $CONFIG['siteurl']."/index.php");
    die();
  }

  if (isset($_GET['id'])) {   
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
          <form method="post" action="">
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