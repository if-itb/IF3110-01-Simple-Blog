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

    var refresh = function() {
        var listofTime = document.getElementsByClassName("art-list-time");

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", "model_komen.php?type=get", true);
        var post = new FormData();
        post.append('id', $_GET['id']);
        if (listofTime.length > 0) 
            post.append('timestamp', listofTime[listofTime.length-1].innerHTML);
        else
            post.append('timestamp', "2000-00-00 00:00:00");
        xmlhttp.send(post);
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText !== "") {
                    var json = JSON.parse(xmlhttp.responseText)[0];
                    var liItem = document.createElement("li");
                    liItem.setAttribute("class", "art-list-item");
                    var divTitleandTime = document.createElement("div");
                    divTitleandTime.setAttribute("class", "art-list-item-title-and-time");
                    var h2Title = document.createElement("h2");
                    h2Title.setAttribute("class", "art-list-title");
                    h2Title.innerHTML = json["nama"];
                    var divTime = document.createElement("div");
                    divTime.setAttribute("class", "art-list-time");
                    divTime.innerHTML = json["waktu"];
                    divTitleandTime.appendChild(h2Title);
                    divTitleandTime.appendChild(divTime);
                    liItem.appendChild(divTitleandTime);
                    var p = document.createElement("p");
                    p.innerHTML = json["komentar"];
                    liItem.appendChild(p);
                    document.getElementById("komen").appendChild(liItem);
                };
            }
        }
    }
    setInterval(refresh, 2000);

    function validate() {
        var post = new FormData();

        var email = document.getElementById("Email").value;
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    function addKomentar() {
        if (validate() == true) {
            var post = new FormData();
            post.append('id', $_GET['id']);
            post.append('nama', document.getElementById("Nama").value);
            post.append('email', document.getElementById("Email").value);
            post.append('komentar', document.getElementById("Komentar").value);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "model_komen.php?type=create", true);
            xmlhttp.send(post);
            return false;
        }
        alert("Alamat email yang dimasukkan tidak valid");
        return false;
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
    
    <?php
        $con = mysqli_connect("localhost","root","","simple");

        // check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        
        $result = mysqli_query($con, "SELECT * FROM post WHERE `id`=".$_GET["id"]);
        if ($row = mysqli_fetch_array($result)) {
    ?>
    <header class="art-header" id="header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?php echo $row["tanggal"]; ?></time>
            <h2 class="art-title"><?php echo $row["judul"]; ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <?php echo $row["konten"]; ?>
            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form method="post" onsubmit="return addKomentar()">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>
            <ul class="art-list-body" id="komen">
                <?php
                    $comments = mysqli_query($con, "SELECT * FROM komen where `id`=".$_GET['id'].' ORDER BY `waktu`');
                    while ($comment = mysqli_fetch_array($comments)) {
                ?>
                <li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title"><a href="post.php"><?php echo $comment["nama"]; ?></a></h2>
                        <div class="art-list-time"><?php echo $comment["waktu"]; ?></div>
                    </div>
                    <p><?php echo $comment["komentar"]; ?></p>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
    <?php } ?>
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
    var $trans = 0;
    window.onscroll = function (e) {
        document.getElementById("header").style.opacity = 1-(e["pageY"]/400);
        console.log(e);
    } 
</script>

</body>
</html>