<!DOCTYPE html>
<html>
<head>

  <?php $title = 'Simple Blog'; ?>
  <?php include 'views/templates/head.php'; ?>

</head>

<body class="default">
<div class="wrapper">

  <?php include 'views/templates/header.php'; ?>

  <div id="home">
      <div class="posts">
          <nav class="art-list">
            <ul class="art-list-body">
              <?php
                if ($result->num_rows > 0) {
                  while ($row = mysqli_fetch_array($result)) {
              ?>

              <li class="art-list-item">
                  <div class="art-list-item-title-and-time">
                      <h2 class="art-list-title"><a href="<?php echo 'post.php?id='.$row['post_id']; ?>"><?php echo $row['post_title']; ?></a></h2>
                      <div class="art-list-time"><?php echo dateBeautifier($row['post_date']); ?></div>
                      <?php if ($row['post_featured']) {
                        echo '<div class="art-list-time"><span>&#10029;</span> Featured</div>';
                      }
                      ?>
                  </div>
                  <p><?php echo $row['post_content']; ?></p>
                  <p>
                    <a href="<?php echo 'new_post.php?id='.$row['post_id']; ?>">Edit</a> | <a href="#" onclick="deleteConfirmationBox(<?php echo $row['post_id']; ?>)">Hapus</a>
                  </p>
              </li>

              <?php
                  }
                } else {
                  echo "Mulai menulis blog sekarang! Tekan tambah post di kanan atas.";
                }
              ?>
            </ul>
          </nav>
      </div>
  </div>

  <?php include 'views/templates/footer.php'; ?>

</div>

<?php include 'views/templates/foot.php'; ?>

</body>
</html>