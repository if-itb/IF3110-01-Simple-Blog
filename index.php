<?php
  require_once 'system/config.php'; 
  require_once 'models/post.php';
  require_once 'system/datetime.php';

  if (isset($_GET['id'])) {
    deletePost((int) $_GET['id']);
    
    header("Location: ". $CONFIG['siteurl']."/index.php");
    die();
  }
?>

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
                $result = readAllPosts();
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
                } }
              ?>
            </ul>
          </nav>
      </div>
  </div>

  <?php include 'templates/footer.php'; ?>

</div>

<?php include 'templates/foot.php'; ?>

</body>
</html>