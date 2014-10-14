<?php require_once 'functions.php';
$post = get_post($_GET["id"]); ?>
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

<title>Simple Blog | Apa itu Simple Blog?</title>


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
            <time class="art-time"><?php echo $post["tanggal"] ?></time>
            <h2 class="art-title"><?php echo $post["judul"] ?></h2>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">

            <?php echo $post["konten"]; ?>

            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form method="post" action="#">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="button" name="submit" value="Kirim" class="submit-button" onclick="return submit_komentar()">
                </form>
            </div>

            <ul class="art-list-body" id="listkomentar">
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

<script>
    function load_komentar() {
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4 && ajax.status == 200) {
                // console.log(ajax.responseText);
                document.getElementById("listkomentar").innerHTML = ajax.responseText;
            }
        }
        ajax.open("GET", "komentar.php?id_post=<?php echo $_GET['id'] ?>", true);
        ajax.send();
    }

    window.onload = load_komentar;

    function submit_komentar() {
        var email_regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
        var emailvalue = document.getElementById("Email").value;
        if (email_regex.test(emailvalue)) {
            var ajax = new XMLHttpRequest();
            ajax.onreadystatechange = function() {
                if (ajax.readyState == 4 && ajax.status == 200) {
                    if (ajax.responseText == "success") {
                        window.alert("Komentar berhasil dimasukkan.");
                        load_komentar();
                    }
                }
            }
            ajax.open("POST", "komentar.php", true);
            ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

            var namavalue = document.getElementById("Nama").value;
            var komentarvalue = document.getElementById("Komentar").value;
            var formdata = "id_post=<?php echo $_GET['id'] ?>" + "&nama=" + namavalue + "&komentar=" + komentarvalue + "&email=" + emailvalue;

            ajax.send(formdata);
        } else {
            window.alert("Email yang dimasukkan bukan email yang valid.");
            return false;
        }
    }
</script>

</body>
</html>