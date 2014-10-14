<?php
    if (isset($_REQUEST['id']))
    {
        require_once("model/post.php");
        $post = new Post();
        $data = $post->GetPost($_REQUEST['id']);
    }
?>
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

<title>Simple Blog | <?php echo $data->judul; ?></title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Luthfi<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">

    <header class="art-header">
        <div class="art-header-inner" id="fade-title">
            <time class="art-time"><?php echo $data->tanggal; ?></time>
            <h2 class="art-title"><?php echo $data->judul; ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <?php echo $data->konten; ?>

            <hr />

            <h2>Komentar</h2>

            <div id="contact-area">
                <form id="form_komen" onsubmit="add_komen();return false;">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">

                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">

                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input id="btn-submit" type="submit" name="submit" value="Kirim" class="submit-button">
                    <div id="loading"><img src="assets/img/loading.gif" alt=""></div>
                </form>
            </div>

            <ul class="art-list-body" id="komen_list">

            </ul>
        </div>
    </div>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        <a class="twitter-link" href="http://luthfihm.com">Luthfi Hamid Masykuri / 13512100</a>
    </aside>
</footer>

</div>

<script type="text/javascript">
    function fade()
    {
        var ScrollTop = window.pageYOffset;
        if (ScrollTop > 20)
        {
            document.getElementById("fade-title").style = "opacity:0;transition: opacity 0.25s ease-in-out;";
        }
        else
        {
            document.getElementById("fade-title").style = "opacity:1;transition: opacity 0.5s ease-in-out;";
        }
    }
    function add_komen()
    {
        var nama = document.getElementById("Nama").value;
        var email = document.getElementById("Email").value;
        var komentar = document.getElementById("Komentar").value;

        if ((nama != "") &&
            (email != "") &&
            (komentar != ""))
        {
            if (validateEmail(email))
            {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp=new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function()
                {
                    if (xmlhttp.readyState<4)
                    {
                        document.getElementById("btn-submit").style="display:none";
                        document.getElementById("komen_list").style="display:none";
                        document.getElementById("loading").style="display:block";
                    }
                    else if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        if (xmlhttp.responseText == "true")
                        {
                            load_komen();
                            document.getElementById("form_komen").reset();
                        }
                        else
                        {
                            alert("Post gagal diproses");
                            document.getElementById("loading").style="display:none";
                            document.getElementById("btn-submit").style="display:block";
                        }
                    }
                }
                xmlhttp.open("POST","controller/add_komen.php",true);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.send("id_post=<?php echo $data->id; ?>&nama="+nama+"&email="+email+"&komentar="+komentar);
            }
            else
            {
                alert("Email tidak valid!");
                document.getElementById("Email").focus();
            }
        }
        else
        {
            alert("Input tidak valid");
            document.getElementById("loading").style="display:none";
            document.getElementById("btn-submit").style="display:block";
        }
    }
    function load_komen()
    {
        var xmlhttp;
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState<4)
            {
                document.getElementById("btn-submit").style="display:none";
                document.getElementById("komen_list").style="display:none";
                document.getElementById("loading").style="display:block";
            }
            else if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                if (xmlhttp.responseText != "zero")
                {
                    var list = JSON.parse(xmlhttp.responseText);
                    var inner = "";
                    var row;
                    var i = 0;
                    for (row in list)
                    {
                        inner +=  '<li class="art-list-item">';
                        inner += '    <div class="art-list-item-title-and-time">';
                        inner += '        <h2 class="art-list-title"><a href="post.php?id=<?php echo $data->id; ?>">'+list[i].nama+'</a></h2>';
                        inner += '            <div class="art-list-time">'+list[i].time+'</div>';
                        inner += '</div>';
                        inner += '            <p>'+list[i].komentar+'</p>';
                        inner += '</li>';
                        i++;
                    }
                    document.getElementById("komen_list").innerHTML = inner;
                }
                document.getElementById("loading").style="display:none";
                document.getElementById("btn-submit").style="display:block";
                document.getElementById("komen_list").style="display:block";
            }
        }
        xmlhttp.open("POST","controller/get_komen.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("id_post=<?php echo $data->id; ?>");


    }
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    load_komen();
    var myVar = setInterval(function(){fade();},1);
</script>

</body>
</html>
