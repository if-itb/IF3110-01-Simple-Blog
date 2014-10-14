  <!DOCTYPE html>
  <html>
  <head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="Deskripsi Blog">
  <meta name="author" content="Judul Blog">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="omfgitsasalmon">
  <meta name="twitter:title" content="Simple Blog">
  <meta name="twitter:description" content="Deskripsi Blog">
  <meta name="twitter:creator" content="Simple Blog">
  <meta name="twitter:image:src" content="{{! TODO: ADD GRAVATAR URL HERE }}">

  <meta property="og:type" content="article">
  <meta property="og:title" content="Simple Blog">
  <meta property="og:description" content="Deskripsi Blog">
  <meta property="og:image" content="{{! TODO: ADD GRAVATAR URL HERE }}">
  <meta property="og:site_name" content="Simple Blog">

  <link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

  <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <title>AYE!</title>

  <?php
    include 'DBConfig.php';
    $result = mysql_query("SELECT * FROM entries ORDER BY TANGGAL DESC",$link);

  ?>

  </head>

  <body class="default">
  
    <div class="wrapper">

      <nav class="nav">
          <a style="border:none;" id="logo" href="index.php"><h1>AYE!</h1></a>
          <ul class="nav-primary">
              <li><a href="new_post.php">+ Tambah Post</a></li>
          </ul>
      </nav>

      <div id="home">
          <div class="posts">
              <nav class="art-list">
                <ul class="art-list-body">
                  <?php
                    while ($row = mysql_fetch_array($result)) {
                  ?>
                  <li class="art-list-item">
                      <div class="art-list-item-title-and-time">
                          <h2 class="art-list-title"><a href=<?php echo "post.php?id=$row[PID]" ?>><?php echo $row['JUDUL']; ?></a></h2>
                          <div class="art-list-time"><?php echo $row['TANGGAL']; ?></div>
                          <div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>
                      </div>
                      <p><?php echo $row['KONTEN'];?> &hellip;</p>
                      <p>
                        <a href=<?php echo "edit_post.php?id=$row[PID]" ?>>Edit</a> | 
                        <a href=<?php echo"delete_post.php?id=$row[PID]"?> class="confirmation">Hapus</a>
                      </p>
                  </li>
                  <?php } ?>
                </ul>
              </nav>
          </div>
      </div>

        <footer class="footer">
            <div class="back-to-top"><a href="">Back to top</a></div>
            <!-- <div class="footer-nav"><p></p></div> -->
            <div class="psi">&Psi;</div>
            <aside class="offsite-links">
                Simple Blog By /
                <a class="rss-link" href="#rss">RSS</a> /
                <br>
                <a class="twitter-link" href="http://twitter.com/akuafik">AFIK</a> /
            </aside>
        </footer>

    </div>


    <script type="text/javascript" src="assets/js/fittext.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/respond.min.js"></script>

    <script type="text/javascript">
      var elems = document.getElementsByClassName('confirmation');
      var confirmIt = function (e) {
          if (!confirm('Yakin akan dihapus?')) e.preventDefault();
      };
      for (var i = 0, l = elems.length; i < l; i++) {
          elems[i].addEventListener('click', confirmIt, false);
      }
    </script>

  </body>
  </html>