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

<title>Simple Blog | Edit Post</title>

</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>Edit Post</h2>
            <div id="contact-area">
                <?php
                    //Open connection to mysql
                    $con=mysqli_connect("localhost","root","","simple_blog");
                    //Connection error checking
                    if (mysqli_connect_errno()){
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    else{
                        $id = mysqli_real_escape_string($con, $_GET['id']);
                        $sql = mysqli_query($con,"SELECT * FROM post WHERE post_id='$id'");
                        $row = mysqli_fetch_array($sql);
                        echo "<form method='post'action='editpost.php?id=$id' onsubmit='return checkForm(this);'>";
                        echo "<label for='Judul'>Judul:</label>";
                        echo "<input type='text' name='Judul' id='Judul' value='" . $row['judul'] . "'>";
                        echo "<label for='Tanggal'>Tanggal:</label>";
                        echo "<input type='text' name='Tanggal' placeholder='dd/mm/yyyy' id='Tanggal' value='" . $row['tanggal']. "'>";                                
                        echo "<label for='Konten'>Konten:</label><br>";
                        echo "<textarea name='Konten' rows='20' cols='20' id='Konten'>" . $row['konten'] . "</textarea>";
                        echo "<input type='submit' name='submit' value='Simpan' class='submit-button'></form>";    
                    }
                ?>
            </div>
        </div>
    </div>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        <a href ="">&copy;2014 by Jonathan Sudibya (13512093)</a> 
    </aside>
</footer>

</div>

<!--<script type="text/javascript" src="assets/js/jquery.min.js"></script>-->
<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>
<script type="text/javascript" src="assets/js/postvalidation.js"></script>

<!--<script type="text/javascript">
  var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

  (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
      function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
      t=h.createElement(o);z=h.getElementsByTagName(o)[0];
      t.src='//www.google-analytics.com/analytics.js';
      z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
      ga('create',ga_ua);ga('send','pageview');
</script>-->

</body>
</html>