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

<title>Simple Blog | Tambah Post</title>
<script type="text/javascript">
    var $_GET = {};
    if(document.location.toString().indexOf('?') !== -1) {
        var query = document.location
                       .toString()
                       // get the query string
                       .replace(/^.*?\?/, '')
                       // and remove any existing hash string (thanks, @vrijdenker)
                       .replace(/#.*$/, '')
                       .split('&');

        for(var i=0, l=query.length; i<l; i++) {
           var aux = decodeURIComponent(query[i]).split('=');
           $_GET[aux[0]] = aux[1];
        }
    }

    var edit = false;
    function post() {
        var post = new FormData();
        var mysql_date = new Date(document.getElementById("Tanggal").value);
        post.append('tanggal', mysql_date.getFullYear()+"-"+(mysql_date.getMonth()+1)+"-"+mysql_date.getDate());
        post.append('judul', document.getElementById("Judul").value);
        post.append('konten', document.getElementById("Konten").value);
        var xmlhttp = new XMLHttpRequest();
        if (edit) {
            post.append('id', $_GET['id']);
            xmlhttp.open("POST", "model_post.php?type=edit", false);
        }
        else {
            xmlhttp.open("POST", "model_post.php?type=create", false);
        }
        xmlhttp.send(post);
        return true;
    }
    function validate() {
        var date = new Date(document.getElementById("Tanggal").value);
        if (date.toString() === "Invalid Date") {
            alert("Tanggal yang dimasukkan tidak valid");
            document.getElementById("Tanggal").value = new Date().toLocaleDateString();
            return false;
        }
        else {
            if (date < new Date(new Date().toLocaleDateString())) {
                alert("Tanggal yang dimasukkan minimal hari ini");
                document.getElementById("Tanggal").value = new Date().toLocaleDateString();
                return false;
            }
        }
        return post();
    }
</script>
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
                <h2>Tambah Post</h2>

                <div id="contact-area">
                    <form method="post" action="index.php" onsubmit="return validate()">
                        <label for="Judul">Judul:</label>
                        <input type="text" name="Judul" id="Judul">

                        <label for="Tanggal">Tanggal:</label>
                        <input type="text" name="Tanggal" id="Tanggal">
                        
                        <label for="Konten">Konten:</label><br>
                        <textarea name="Konten" rows="20" cols="20" id="Konten"></textarea>

                        <input type="submit" name="submit" value="Simpan" class="submit-button">
                    </form>
                </div>
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
<script type="text/javascript">
    // get the 'id' query parameter
    document.getElementById("Tanggal").value = new Date().toLocaleDateString();
    if ($_GET['id']) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "model_post.php?type=get&id="+$_GET['id'], true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText !== "false") {
                    edit = true;
                    console.log(xmlhttp.responseText);
                    var json = JSON.parse(xmlhttp.responseText)[0];

                    document.getElementById("Judul").value = json["judul"];
                    document.getElementById("Tanggal").value = json["tanggal"];
                    document.getElementById("Konten").value = json["konten"];
                }
            }
        }
    }
</script>
</body>
</html>