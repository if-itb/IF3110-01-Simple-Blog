<!DOCTYPE html>
<html>
<head>

  <?php $title = 'Simple Blog | '. $title = isset($_GET['id']) ? 'Edit Post' : 'Tambah Post'; ?>
  <?php include 'views/templates/head.php'; ?>

</head>

<body class="default">
<div class="wrapper">

  <?php include 'views/templates/header.php'; ?>

  <article class="art simple post">
          
    <h2 class="art-title"></h2>

    <div class="art-body">
      <div class="art-body-inner">
        <h2>Tambah Post</h2>

        <div id="contact-area">
          <form method="post" action="" onsubmit="return validatePost(this)">
            <input type="hidden" name="id" id="id" value="<?php echo isset($data) ? $data['post_id'] : '' ?>" id="EditMode">

            <label for="Judul">Judul:</label>
            <input type="text" name="Judul" id="Judul" value="<?php echo isset($data) ? $data['post_title'] : ''; ?>">

            <label for="Tanggal">Tanggal:</label>
            <input type="text" name="Tanggal" id="Tanggal" placeholder="dd-mm-yyyy" value="<?php echo isset($data) ? $data['post_date'] : ''; ?>">
            
            <label for="Konten">Konten:</label><br>
            <textarea name="Konten" rows="20" cols="20" id="Konten"><?php echo isset($data) ? $data['post_content'] : ''; ?></textarea>

            <input type="submit" name="submit" value="Simpan" class="submit-button">
          </form>
        </div>
      </div>
    </div>

  </article>

  <?php include 'views/templates/footer.php'; ?>

</div>

<?php include 'views/templates/foot.php'; ?>

</body>
</html>