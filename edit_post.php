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

<title>Simple Blog | Edit Post</title>

<?php
	require_once('config.php');
	if(isset($_POST['submit'])){
		$_POST = array_map( 'stripslashes', $_POST );
		extract($_POST);
		if($title ==''){
			$error[] = 'Belum ada judul';
		}
		if($content ==''){
			$error[] = 'Belum ada isi';
		}
		if(!isset($error)){
			try {
				$stmt = $db->prepare('INSERT INTO post (title,content,date) VALUES (:title, :content, :date)') ;
				$stmt->execute(array(
					':title' => $title,
					':content' => $content,
					':date' => date('Y-m-d H:i:s')
				));
				header('Location: index.php?action=added');
				exit;
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
	}
	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}
	try {
		$stmt = $db->prepare('SELECT id, title, content FROM post WHERE id = :id');
		$stmt->execute(array(':id' => $_GET['id']));
		$row = $stmt->fetch(); 

	} catch(PDOException $e) {
		echo $e->getMessage();
	}
?>

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
            <h2>Edit Post</h2>

            <div id="contact-area">
                <form method="post" action=''>
                    <input type='hidden' name='id' value='<?php echo $row['id'];?>'>
					
					<label for="Judul">Judul:</label>
                    <input type="text" name="title" id="Judul"
					value='<?php echo $row['title'];?>'>

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="Tanggal" id="Tanggal">
                    
					<label for="Konten">Konten:</label><br>
                    <textarea name="content" rows="20" cols="20" id="Konten"><?php echo $row['content'];?></textarea>
					
                    <input type="submit" name="submit" value="Update" class="submit-button">
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
        IF3110 /
        <a class="rss-link" href="#rss">RSS</a> /
        <br>
		<a class="twitter-link" href="#">M. Rian Fakhrusy</a> 
		<br>
        <a class="twitter-link" href="#">13511008</a>
        
    </aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>
<script type="text/javascript">
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