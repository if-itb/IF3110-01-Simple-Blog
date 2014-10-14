<?php
//open connection to db
$db_post = mysqli_connect('localhost','root', "", 'simpleblog');

//get from param
$id = $_GET["id"];

$query = "SELECT * FROM `listpost` WHERE Idx=".$id."";
$results = mysqli_query($db_post, $query);
$result = $results->fetch_assoc();

$judul_post = $result['Judul'];
$tanggal_post = DateTime::createFromFormat('Y-m-d',$result['Tanggal'])->format('j F Y');
$konten_post = $result['Konten'];
	
mysqli_close($db_post);	

echo "
<!DOCTYPE html>
<html>
<head>

<meta charset=\"utf-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">
<meta name=\"description\" content=\"Deskripsi Blog\">
<meta name=\"author\" content=\"Judul Blog\">

<!-- Twitter Card -->
<meta name=\"twitter:card\" content=\"summary\">
<meta name=\"twitter:site\" content=\"omfgitsasalmon\">
<meta name=\"twitter:title\" content=\"Simple Blog\">
<meta name=\"twitter:description\" content=\"Deskripsi Blog\">
<meta name=\"twitter:creator\" content=\"Simple Blog\">
<meta name=\"twitter:image:src\" content=\"{{! TODO: ADD GRAVATAR URL HERE }}\">

<meta property=\"og:type\" content=\"article\">
<meta property=\"og:title\" content=\"Simple Blog\">
<meta property=\"og:description\" content=\"Deskripsi Blog\">
<meta property=\"og:image\" content=\"{{! TODO: ADD GRAVATAR URL HERE }}\">
<meta property=\"og:site_name\" content=\"Simple Blog\">

<link rel=\"stylesheet\" type=\"text/css\" href=\"assets/css/screen.css\" />
<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"img/favicon.ico\">

<!--[if lt IE 9]>
    <script src=\"http://html5shim.googlecode.com/svn/trunk/html5.js\"></script>
<![endif]-->

<title>Simple Blog | ". $judul_post ."</title>


</head>

<body class=\"default\" onload=\"load_comment()\">
<div class=\"wrapper\">

<nav class=\"nav\">
    <a style=\"border:none;\" id=\"logo\" href=\"index.php\"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class=\"nav-primary\">
        <li><a href=\"new_post.html\">+ Tambah Post</a></li>
    </ul>
</nav>
	";

	echo "
<article class=\"art simple post\">

    <header class=\"art-header\">
        <div class=\"art-header-inner\" style=\"margin-top: 0px; opacity: 1;\">
            <time class=\"art-time\">". $tanggal_post ."</time>
            <h2 class=\"art-title\">". $judul_post ."</h2>
            <p class=\"art-subtitle\"></p>
        </div>
    </header>

    <div class=\"art-body\">
        <div class=\"art-body-inner\">
            <hr class=\"featured-article\" />
            <p>". $konten_post ."</p>
            
            <hr />
            
            <h2>Komentar</h2>

            <div id=\"contact-area\">
                <form method=\"post\" onsubmit=\"return submitcomment()\">
					<input type=\"hidden\" name=\"id\" id=\"id\" value=". $id .">
					
                    <label for=\"Nama\">Nama:</label>
                    <input type=\"text\" name=\"Nama\" id=\"Nama\" required>
        
                    <label for=\"Email\">Email:</label>
                    <input type=\"text\" name=\"Email\" id=\"Email\" required>
					<span id=\"email-validation\"> </span>
                   
                    <label for=\"Komentar\">Komentar:</label><br>
                    <textarea name=\"Komentar\" rows=\"20\" cols=\"20\" id=\"Komentar\"></textarea>

                    <input type=\"submit\" name=\"submit\" value=\"Kirim\" class=\"submit-button\">
                </form>
            </div>

            <ul id=\"comments\" class=\"art-list-body\">

			</ul>
        </div>
    </div>

</article>

";

echo "

<footer class=\"footer\">
    <div class=\"back-to-top\"><a href=\"\">Back to top</a></div>
    <!-- <div class=\"footer-nav\"><p></p></div> -->
    <div class=\"psi\">&Psi;</div>
    <aside class=\"offsite-links\">
        Asisten IF3110 /
        <a class=\"rss-link\" href=\"#rss\">RSS</a> /
        <br>
        <a class=\"twitter-link\" href=\"http://twitter.com/YoGiiSinaga\">Yogi</a> /
        <a class=\"twitter-link\" href=\"http://twitter.com/sonnylazuardi\">Sonny</a> /
        <a class=\"twitter-link\" href=\"http://twitter.com/fathanpranaya\">Fathan</a> /
        <br>
        <a class=\"twitter-link\" href=\"#\">Renusa</a> /
        <a class=\"twitter-link\" href=\"#\">Kelvin</a> /
        <a class=\"twitter-link\" href=\"#\">Yanuar</a> /
        
    </aside>
</footer>

</div>

<script type=\"text/javascript\" src=\"assets/js/fittext.js\"></script>
<script type=\"text/javascript\" src=\"assets/js/app.js\"></script>
<script type=\"text/javascript\" src=\"assets/js/respond.min.js\"></script>
<script type=\"text/javascript\" src=\"assets/js/komenajax.js\"></script>
<script type=\"text/javascript\">
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

";
?>