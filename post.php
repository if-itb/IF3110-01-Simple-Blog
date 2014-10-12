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

<script>
    
</script>


<?php 
    $con = mysqli_connect("localhost", "root", "", "wbd");

    if(mysqli_connect_errno()){
        echo "<title>Database connection error</title>";
    }
    else{
        $postid = $_GET['post-id'];
        $query = "SELECT * FROM post WHERE id = ".$_GET['post-id'];
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $row = mysqli_fetch_assoc($result);
        echo "<title>Simple Blog | ".$row['title']."</title>";
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
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?php echo $row['date']; ?></time>
            <h2 class="art-title"><?php echo $row['title']; ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p><?php echo $row['content']; ?></p>

            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form method="post" name="commentForm">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="name" id="name">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="email" id="email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="content" rows="20" cols="20" id="content"></textarea>

                    <input type="hidden" name="post-id" value="<?php echo $postid; ?>">

                    <input type="button" name="submit" value="Kirim" class="submit-button" onclick="validateEmail();">
                </form>
            </div>

            <div id="comment">
                <script type="text/javascript">loadComment()</script>
            </div>
        </div>
    </div>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Gilang Julian S. / 13512045
    </aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>
<script type="text/javascript" src="assets/js/tambahan.js"></script>

</body>
</html>