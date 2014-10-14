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

<script>
	function validateDate()
	{
		var date;
		
		date = document.getElementById("Date").value;
		
		if ((new Date(date).getTime()+ 24*60*60*1000) > new Date().getTime() )
		{
			return true;
		}
		else
		{
			alert("Tanggal yang anda masukkan tidak valid!");
			return false;
		}
	}
</script>

</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
</nav>

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>Tambah Post</h2>
			
			<?php
			
				// adding new Post
				if (!empty($_POST))
				{
					include ("mysql.php");
					
					if (mysql_safe_query('INSERT INTO post (title,body,date) VALUES (%s,%s,%s)', $_POST['Title'], $_POST['Content'], $_POST['Date']))
						echo 'Entry posted. <a href = "post.php?id='.mysql_insert_id().'">view</a>';	
					else
						echo mysql_error();
				}
				else
				{
					//echo 'Kocak lu';
				}
			?>
			
            <div id="contact-area">
                <form method="post" onsubmit ="return validateDate();">
                    <label for="Judul">Title:</label>
                    <input type="text" name="Title" id="Title" placeholder ="Title">

                    <label for="Tanggal">Date:</label>
                    <input type="text" name="Date" id="Date" placeholder ="yyyy-mm-dd">
                    
                    <label for="Konten">Content:</label><br>
                    <textarea name="Content" rows="20" cols="20" id="Content"></textarea>

                    <input type="submit" name="submit" value="Post" class="submit-button">
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

</body>
</html>