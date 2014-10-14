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
                <form method="post" action="#" onsubmit="add_post();return false;">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" value="<?php echo date('Y-m-d'); ?>" name="Tanggal" id="Tanggal">

                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten"></textarea>

                    <input id="btn-submit" type="submit" name="submit" value="Simpan" class="submit-button" >
                    <div id="loading"><img src="assets/img/loading.gif" alt=""></div>
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
        <a class="twitter-link" href="http://luthfihm.com">Luthfi Hamid Masykuri / 13512100</a>
    </aside>
</footer>

</div>
<script type="text/javascript">
    function add_post()
    {
        var judul = document.getElementById("Judul").value;
        var tanggal = document.getElementById("Tanggal").value;
        var konten = document.getElementById("Konten").value;

        if ((judul != "") &&
            (tanggal != "") &&
            (konten != ""))
        {
            if (validateDate(tanggal))
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
                        document.getElementById("loading").style="display:block";
                    }
                    else if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        if (xmlhttp.responseText == "true")
                        {
                            window.location = "index.php";
                        }
                        else
                        {
                            alert("Post gagal diproses");
                            document.getElementById("loading").style="display:none";
                            document.getElementById("btn-submit").style="display:block";
                        }
                    }
                }
                xmlhttp.open("POST","controller/add_post.php",true);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.send("judul="+judul+"&tanggal="+tanggal+"&konten="+konten);
            }
            else
            {
                alert("Tanggal tidak valid!");
                document.getElementById("Tanggal").focus();
            }
        }
        else
        {
            alert("Input tidak valid");
            document.getElementById("loading").style="display:none";
            document.getElementById("btn-submit").style="display:block";
        }
    }
    function validateDate(tanggal) {
        var re = /^(19|20)\d\d[\-](0[1-9]|1[012])[\-](0[1-9]|[12][0-9]|3[01])$/;
        if(re.test(tanggal))
        {
            var d = new Date(tanggal);
            return !isNaN(d);
        }
        else
        {
            return false;
        }
    }
    </script>

</body>
</html>
