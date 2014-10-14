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

<?php
	include ("mysql.php");
?>

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Simple Blog | Edit Post</title>

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
            <h2>Edit Post</h2>
			
			<?php
				if (!empty($_POST))
				{
					mysql_safe_query("UPDATE post SET title = '".$_POST['Title'] ."' ,body = '".$_POST['Content'] ."' ,date = '".$_POST['Date'] ."' WHERE id = ".$_GET['id']);
					$title = $_POST['Title'];
					$date = $_POST['Date'];
					$content = $_POST['Content'];
					echo ("<b>Editing is Success.</b>");
				}
				else
				{
					$query = mysql_safe_query("SELECT * FROM post WHERE id = ".$_GET['id']);
					$data = mysql_fetch_row($query);
					$title = $data[1];
					$date = $data[3];
					$content = $data[2];
				}
			?>
			
            <div id="contact-area">
                <form method="post">
                    <label for="Judul">Title:</label>
                    <input type="text" name="Title" id="Title" value = "<?php echo $title ?>" placeholder = "Title">

                    <label for="Tanggal">Date:</label>
                    <input type="text" name="Date" id="Date" value = "<?php echo $date ?>" placeholder ="yyyy-mm-dd">
                    
                    <label for="Konten">Content:</label><br>
                    <textarea name="Content" rows="20" cols="20" id="Content" ><?php echo $content;?></textarea>

                    <input type="submit" name="submit" value="Edit" class="submit-button">
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