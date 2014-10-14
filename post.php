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

<script type="text/javascript" src="/assets/js/validation.js"></script>
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--> 
            
    <?php
        include ("mysql.php"); 
        $id = $_GET['id'];
        $result = mysql_safe_query('SELECT * FROM post WHERE id = %s LIMIT 1', $_GET['id']);
                
        if (!mysql_num_rows($result))
        {
            echo 'Post #'.$_GET['id'].' not found';
        }
        else
        {
            $data = mysql_fetch_row($result);
        }
    ?>

<title>Simple Blog | <?php if (isset($_GET['id']) && mysql_num_rows($result)) echo $data[1] ?></title>    

</head>

<body class="default" onload = "loadComment();">

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
            <time class="art-time"><?php if (isset($_GET['id']) && mysql_num_rows($result)) echo $data[3] ?></time>
            <h2 class="art-title"><?php if (isset($_GET['id']) && mysql_num_rows($result)) echo $data[1] ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
                <p> <?php if (isset($_GET['id']) && mysql_num_rows($result)) echo nl2br($data[2]);?> </p>
            <hr />
            <h2><b> COMMENTS </h2></b>
            
            
            
            <div id = "Comments"> </div>
            
            <hr>
            <h2>Give Comment</h2>
            
            <div id="contact-area">
                <form name="commentForm" id="commentForm" onsubmit="addComment('<?php echo $id; ?>'); return false;">
                    <label for="Nama">Name:</label>
                    <input type="text" name="Name" id="Name" value = "">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email" value = "">
                    
                    <label for="Komentar">Comment:</label><br>
                    <textarea name="Comment" rows="20" cols="20" id="Comment"></textarea>

                    <input type="submit" name="submit" value="Post Comment" class="submit-button">
                </form>
            </div>

            <ul class="art-list-body">
                <div id="commentList"></div>
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

</body>
</html>