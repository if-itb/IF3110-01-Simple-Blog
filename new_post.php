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
          <form method="post" action="#">
            <label for="Judul">Judul:</label>
            <input type="text" name="Judul" id="Judul">

            <label for="Tanggal">Tanggal:</label>
            <input type="text" name="Tanggal" id="Tanggal">
            
            <label for="Konten">Konten:</label><br>
            <textarea name="Konten" rows="20" cols="20" id="Konten"></textarea>

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