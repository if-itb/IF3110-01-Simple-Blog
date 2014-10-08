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
              <li class="art-list-item">
                  <div class="art-list-item-title-and-time">
                      <h2 class="art-list-title"><a href="post.html">Apa itu Simple Blog?</a></h2>
                      <div class="art-list-time">15 Juli 2014</div>
                      <div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! &hellip;</p>
                  <p>
                    <a href="#">Edit</a> | <a href="#">Hapus</a>
                  </p>
              </li>

              <li class="art-list-item">
                  <div class="art-list-item-title-and-time">
                      <h2 class="art-list-title"><a href="post.html">Siapa dibalik Simple Blog?</a></h2>
                      <div class="art-list-time">11 Juli 2014</div>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! &hellip;</p>
                  <p>
                    <a href="#">Edit</a> | <a href="#">Hapus</a>
                  </p>
              </li>
            </ul>
          </nav>
      </div>
  </div>

  <?php include 'templates/footer.php'; ?>

</div>

</body>
</html>