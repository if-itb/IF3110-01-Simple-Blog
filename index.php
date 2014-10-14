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

<title>Simple Blog</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Luthfi<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
            <?php
                require_once("model/post.php");
                $post = new Post();
                $result = $post->GetAllPost();
                while($row = mysql_fetch_object($result))
                {
                    if (strlen($row->konten) > 250)
                    {
                        $konten = substr($row->konten,0,250);
                    }
                    else
                    {
                        $konten = $row->konten;
                    }
            ?>
            <li class="art-list-item">
                <div class="art-list-item-title-and-time">
                    <h2 class="art-list-title"><a href="post.php?id=<?php echo $row->id; ?>"><?php echo $row->judul; ?></a></h2>
                    <div class="art-list-time"><?php echo $row->tanggal; ?></div>
                </div>
                <p><?php echo $konten; ?> &hellip;</p>
                <p>
                    <a href="edit_post.php?id=<?php echo $row->id; ?>">Edit</a> | <a href="#" onclick="del_post(<?php echo $row->id; ?>)">Hapus</a>
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
        <a class="twitter-link" href="http://luthfihm.com">Luthfi Hamid Masykuri / 13512100</a>
    </aside>
</footer>

</div>

<div id="full-load" align="center">
    <img src="assets/img/loading.gif" alt="">
</div>

<script type="text/javascript">
    function del_post(id)
    {
        if (confirm("Apakah Anda yakin menghapus post ini?"))
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
                    document.getElementById("full-load").style = "display:block";
                }
                else if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    if (xmlhttp.responseText == "true")
                    {
                        window.location = "index.php";
                    }
                    else
                    {
                        alert("Gagal menghapus!");
                        document.getElementById("full-load").style = "display:none";
                    }
                }
            }
            xmlhttp.open("POST","controller/del_post.php",true);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlhttp.send("id="+id);
        }
    }
</script>

</body>
</html>
