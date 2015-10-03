<!DOCTYPE html>
<?php include 'connection.php';?>
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
    <meta name="twitter:title" content="Coretan Yoga">
    <meta name="twitter:description" content="Deskripsi Blog">
    <meta name="twitter:creator" content="Coretan Yoga">
    <meta name="twitter:image:src" content="{{! TODO: ADD GRAVATAR URL HERE }}">

    <meta property="og:type" content="article">
    <meta property="og:title" content="Coretan Yoga">
    <meta property="og:description" content="Deskripsi Blog">
    <meta property="og:image" content="{{! TODO: ADD GRAVATAR URL HERE }}">
    <meta property="og:site_name" content="Coretan Yoga">

    <link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <title>Simple Blog | home</title>


  </head>

  <body class="default">
    <div class="wrapper">

      <nav class="nav" id="#top">
          <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
          <ul class="nav-primary">
              <li><a href="new_post.php">+ Tambah Post</a></li>
          </ul>
      </nav>

      <div id="home">
          <div class="posts">
              <nav class="art-list">
                <ul class="art-list-body">
                  <?php
                    $result = mysqli_query($con,"SELECT * FROM postingan ORDER BY Tanggal DESC");
                    while($key = mysqli_fetch_array($result)){    
                  ?>
                    <li class="art-list-item">
                        
                        <div class="art-list-item-title-and-time">
                            <h2 class="art-list-title"><a href="post.php?var=<?php echo $key['ID']?>"><?php $string = $key['Judul'];
                        $string = strip_tags($string);
                        if (strlen($string) > 25) {
                            $stringCut = substr($string, 0, 25);
                            $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
                        }
                        echo $string?></a></h2>
                            <div class="art-list-time"><?php echo $key['Tanggal'] ?></div>
                            <a href="edit_post.php?var=<?php echo $key['ID']?>">Edit</a> | <a href="delete.php?var=<?php echo $key['ID']?>" onclick="return confirmDelete()">Hapus</a>
                        
                        </div>

                        <p><?php 
                        $string = $key['Konten'];
                        $string = strip_tags($string);
                        if (strlen($string) > 200) {
                            $stringCut = substr($string, 0, 200);
                            $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
                            echo $string;?>
                            <a href="post.php?var=<?php echo $key['ID']?>">Read More</a><?php
                        }
                        else {
                            echo $string;
                        }
                        ?></p>
                        
                    </li>
                  <?php
                    }
                  ?>
                </ul>
              </nav>
          </div>
      </div>

      <footer class="footer">
          <div class="back-to-top"><a href="#top">Back to top</a></div>
          <!-- <div class="footer-nav"><p></p></div> -->
          <div class="psi">&Psi;</div>
          <aside class="offsite-links">
              Tugas 1 IF3110 /
              <a class="twitter-link" href="http://twitter.com/rakhmatullah25" target="_blank">Rakhmatullah Yoga Sutrisna</a>
              
          </aside>
      </footer>

    </div>

    <script type="text/javascript" src="assets/js/function.js"></script>
    <script type="text/javascript" src="assets/js/fittext.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/respond.min.js"></script>
    <script type="text/javascript">
      var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

      (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
          function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
          t=h.createElement(o);z=h.getElementsByTagName(o)[0];
          t.src='//www.google-analytics.com/analytics.js';
          z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
          ga('create',ga_ua);ga('send','pageview');
    </script>

  </body>
</html>