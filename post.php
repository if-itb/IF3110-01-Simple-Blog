<?php
  require_once 'system/config.php';
  require_once 'models/post.php';
  require_once 'system/datetime.php';

  if (!isset($_GET['id'])) {     
    header("Location: ". $CONFIG['siteurl']."/index.php");
    die();
  }   
  
  $result = readPost((int) $_GET['id']);
  
  if ($result->num_rows > 0) { 
    $row = mysqli_fetch_array($result);
  } else {
    header("Location: ". $CONFIG['siteurl']."/index.php");
    die();
  }
?>

<!DOCTYPE html>
<html>
<head>

  <?php $title = 'Simple Blog | '.$row['post_title']; ?>
  <?php include 'views/templates/head.php'; ?>

</head>

<body class="default" onload="loadComment(<?php echo $row['post_id']; ?>)">
<div class="wrapper">

  <?php include 'views/templates/header.php'; ?>

  <article class="art simple post">
      
    <header class="art-header">
      <div class="art-header-inner">
        <time class="art-time"><?php echo dateBeautifier($row['post_date']) ?></time>
        <h2 class="art-title"><?php echo $row['post_title'] ?></h2>
        <p class="art-subtitle"></p>
      </div>
    </header>

    <div class="art-body">
      <div class="art-body-inner">
        <hr class="featured-article" />
        <p><?php echo $row['post_content'] ?></p>
        <hr />
          
        <h2>Komentar</h2>

        <div id="contact-area">
          <form method="post" action="" onsubmit="addComment(this,<?php echo $row['post_id']; ?>); return false">
            <label for="Nama">Nama:</label>
            <input type="text" name="Nama" id="Nama">

            <label for="Email">Email:</label>
            <input type="text" name="Email" id="Email">
            
            <label for="Komentar">Komentar:</label><br>
            <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

            <input type="submit" name="submit" value="Kirim" class="submit-button">
          </form>
        </div>

        <ul class="art-list-body" id="comments">
        </ul>

      </div>
    </div>

  </article>

  <?php include 'views/templates/footer.php'; ?>

</div>

<?php include 'views/templates/foot.php'; ?>

</body>
</html>