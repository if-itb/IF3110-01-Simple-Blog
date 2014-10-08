<?php require 'config.php'; ?>
<?php require 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>

  <?php $title = 'Simple Blog'; ?>
  <?php include 'templates/head.php'; ?>

</head>

<body class="default">
<div class="wrapper">

  <?php include 'templates/header.php'; ?>

  <div id="home">
      <div class="posts">
          <nav class="art-list">
            <ul class="art-list-body">
              <?php
                $query = "SELECT * FROM `posts` ORDER BY `post_date` DESC";
                $result = mysqli_query($conn, $query);
                if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)) {
              ?>

              <li class="art-list-item">
                  <div class="art-list-item-title-and-time">
                      <h2 class="art-list-title"><a href="<?php echo 'post.php'.$row['post_id']; ?>"><?php echo $row['post_title']; ?></a></h2>
                      <div class="art-list-time"><?php echo $row['post_date']; ?></div>
                  </div>
                  <p><?php echo $row['post_content']; ?></p>
                  <p>
                    <a href="#">Edit</a> | <a href="#">Hapus</a>
                  </p>
              </li>

              <?php }} ?>
            </ul>
          </nav>
      </div>
  </div>

  <?php include 'templates/footer.php'; ?>

</div>

<?php include 'templates/foot.php'; ?>

</body>
</html>