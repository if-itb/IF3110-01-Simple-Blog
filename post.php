<!DOCTYPE html>
<html>
<head>
<?php
    // Create connection
    $con=mysqli_connect("localhost","root","","blog_posts");

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM post WHERE post_id = '$id'";
    $sql1 = "SELECT * FROM comment WHERE comment_post_id = '$id'";
    if (!($result = mysqli_query($con,$sql)) || !($result1 = mysqli_query($con,$sql1))) {
      die('Error: ' . mysqli_error($con));
    }

    mysqli_close($con);
?>
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
<?php $row = mysqli_fetch_array($result) ?>
<title><?php echo $row['post_title']?></title>
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
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time">
                <?php 
                echo '<script type="text/javascript">'
                    ,'convertDate('.$row['post_date'].')'
                ,'</script>';
                ?>
            </time>
            <h2 class="art-title"><?php echo $row['post_title'] ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>
    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <?php echo $row['post_content'] ?>
            <hr />

            <h2>Komentar</h2>

            <div id="contact-area">
                <form method="post" action="connect_comment.php">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>
                    <script>
                        var tanggal = new Date();
                        tanggal = convertDate(tanggal);
                    </script>
                    <input type="button" name="submit" value="Kirim" class="submit-button" onclick="return showComment()">
                </form>
            </div>

            <ul class="art-list-body">
                <li class="art-list-item">
                 <div class="art-list-item-title-and-time">
                    <h2 class="art-list-title"><a href='#' id="ajaxnama"></a></h2>
                    <div class="art-list-time" id="ajaxtanggal"></div>
                </div>
                <p><div id="ajaxkomentar"></div></p>
            </li>
			<?php
              while($row1 = mysqli_fetch_array($result1)) { ?>
                <li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title"><a href="post.php"><?php echo $row1['comment_name'] ?></a></h2>
                        <div class="art-list-time">
                            <?php echo '<script type="text/javascript">'
                                ,'convertDate('.$row1['post_date'].')'
                                ,'</script>';
                            ?>
                        </div>
                    <p><?php echo $row['post_content'] ?>&hellip;</p>
                </li>
              <?php } ?>
            </ul>
        </div>
    </div>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Asisten IF3110 /
        <a class="rss-link" href="#rss">RSS</a> /
        <br>
        <a class="twitter-link" href="http://twitter.com/YoGiiSinaga">Yogi</a> /
        <a class="twitter-link" href="http://twitter.com/sonnylazuardi">Sonny</a> /
        <a class="twitter-link" href="http://twitter.com/fathanpranaya">Fathan</a> /
        <br>
        <a class="twitter-link" href="#">Renusa</a> /
        <a class="twitter-link" href="#">Kelvin</a> /
        <a class="twitter-link" href="#">Yanuar</a> /
        
    </aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
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
<script>
        function convertDate(tanggal){
            var t1 = tanggal.getDate();
            var t2 = tanggal.getMonth();
            var month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            var t3 = tanggal.getFullYear();
            var t = t1+" "+month[t2]+" "+t3;
            return t;
        }
     function showComment() {
            var nama = document.getElementById('Nama').value;
                var email = document.getElementById('Email').value;
                var konten = document.getElementById('Komentar').value;
                var tanggal = new Date();
                var id = <?php echo $id ?>;
                if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp=new XMLHttpRequest();
                } else { // code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                        document.getElementById("ajaxnama").innerHTML=xmlhttp.responseText;
                        //document.getElementById("ajaxnama").innerHTML=nama;
                        //document.getElementById("ajaxtanggal").innerHTML=convertDate(tanggal);
                        //document.getElementById("ajaxkomentar").innerHTML=konten;
                    }
                }
                xmlhttp.open("POST","ajax.php?id="+id,true);
                xmlhttp.send();
        }
</script>
</body>

</html>