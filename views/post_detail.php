<!DOCTYPE html>
<html>
<head>

  <?php $title = 'Simple Blog | '.$data['post_title']; ?>
  <?php include 'views/templates/head.php'; ?>

</head>

<?php
  $url = $CONFIG['siteurl'].'/comment/list/'.$data['post_id'];
  $url = "'".$url."'";
?>
<body class="default" onload="loadComment(<?php echo $url; ?>)">
<div class="wrapper">

  <?php include 'views/templates/header.php'; ?>

  <article class="art simple post">
      
    <header class="art-header">
      <div class="art-header-inner">
        <time class="art-time"><?php echo dateBeautifier($data['post_date']) ?></time>
        <h2 class="art-title"><?php echo $data['post_title'] ?></h2>
        <p class="art-subtitle"></p>
      </div>
    </header>

    <div class="art-body">
      <div class="art-body-inner">
        <hr class="<?php echo $data['post_featured'] ? 'featured-article' : ''; ?>" />
        <p><?php echo $data['post_content'] ?></p>
        <hr />
          
        <h2>Komentar</h2>

        <div id="contact-area">
          <?php
            $url = $CONFIG['siteurl'].'/comment/new';
            $url = "'".$url."'";
          ?>
          <form method="post" action="" onsubmit="addComment(<?php echo $url; ?>, this, <?php echo $data['post_id']; ?>); return false">
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