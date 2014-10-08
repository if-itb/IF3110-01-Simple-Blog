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
        <time class="art-time">15 Juli 2014</time>
        <h2 class="art-title">Apa itu Simple Blog?</h2>
        <p class="art-subtitle"></p>
      </div>
    </header>

    <div class="art-body">
      <div class="art-body-inner">
        <hr class="featured-article" />
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis aliquam minus consequuntur amet nulla eius, neque beatae, nostrum possimus, officiis eaque consectetur. Sequi sunt maiores dolore, illum quidem eos explicabo! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam consequuntur consequatur molestiae saepe sed, incidunt sunt inventore minima voluptatum adipisci hic, est ipsa iste. Nobis, aperiam   provident quae. Reprehenderit, iste.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores animi tenetur nam delectus eveniet iste non culpa laborum provident minima numquam excepturi rem commodi, officia accusamus eos voluptates obcaecati. Possimus?</p>

        <hr />
          
        <h2>Komentar</h2>

        <div id="contact-area">
          <form method="post" action="#">
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