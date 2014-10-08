<?php require 'config.php'; ?>

<?php
  if (isset($_GET['id'])) {     
    include 'db.php';       
    
    $id = (int) $_GET['id'];
    $query = "SELECT * FROM `posts` WHERE `post_id` = '$id'";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) { 
      $row = mysqli_fetch_array($result);
    } else {
      header("Location: ". $CONFIG['siteurl']."/index.php");
      die();
    }
  } else {
    header("Location: ". $CONFIG['siteurl']."/index.php");
    die();
  }
?>

<!DOCTYPE html>
<html>
<head>

  <?php $title = 'Simple Blog | Apa itu Simple Blog?'; ?>
  <?php include 'templates/head.php'; ?>

</head>

<body class="default">
<div class="wrapper">

  <?php include 'templates/header.php'; ?>

  <article class="art simple post">
      
    <header class="art-header">
      <div class="art-header-inner">
        <time class="art-time"><?php echo $row['post_date'] ?></time>
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

        <ul class="art-list-body">
          <li class="art-list-item">
            <div class="art-list-item-title-and-time">
                <h2 class="art-list-title"><a href="post.html">Jems</a></h2>
                <div class="art-list-time">2 menit lalu</div>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! &hellip;</p>
          </li>

          <li class="art-list-item">
            <div class="art-list-item-title-and-time">
                <h2 class="art-list-title"><a href="post.html">Kave</a></h2>
                <div class="art-list-time">1 jam lalu</div>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! &hellip;</p>
          </li>
        </ul>
      </div>
    </div>

  </article>

  <?php include 'templates/footer.php'; ?>

</div>

<?php include 'templates/foot.php'; ?>

</body>
</html>