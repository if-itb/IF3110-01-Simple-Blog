<?php
    require_once dirname(__FILE__)."/assets/db/db_connection.php";
    $db = Database::getInstance()->getHandle();

    // get the errors
    $id = null;
    static $error = "";
    if(isset($_GET['id']))
        $id = $db->escapeString($_GET['id']);
    else
        $error .= "Post ID not defined!";

    $defined_methods = ["view", "delete"];
    $method = null;
    if(isset($_GET['method'])) {
        $method = $db->escapeString($_GET['method']);
        if(!in_array($method, $defined_methods)) {
            $error .= "<br/>Unknown method: ".$method;
        }
    } else {
        // TODO: using GOTO?
        $error .= "<br/>Method undefined!";
    }
    ob_start();
?>
<!DOCTYPE html>
<!-- this page manages all stuff about posts: 
        - view (including comments)
        - delete
-->
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
<meta name="twitter:creator" content="Alvin Natawiguna">
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

<title>Simple Blog | <!--TITLE--></title>


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
if($method == 'view'):
    $table = Database::$table_post;
    $statement = $db->prepare("SELECT * FROM $table WHERE id=:id");

    $statement->bindValue(':id', $id);

    $post = $statement->execute();

    if($post): // view the post
        $post = $post->fetchArray();
        $pageTitle = $post['judul'];
?>  
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time">
            <?php 
                $date = new DateTime($post["tanggal"]);
                echo $date->format("l, j F o");
            ?>
            </time>
            <h2 class="art-title"><?php echo $pageTitle;?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <?php if($post["featured"] == 1): ?><hr class="featured-article" /> <?php endif;?>
            <p><?php echo $post["konten"]; ?></p>

            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form method="post" action="#">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>

            <ul class="art-list-body">
                <li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title"><a href="post.html">Jems</a></h2>
                        <div class="art-list-time">2 menit lalu</div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! &hellip;</p>
                </li>

                <li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title"><a href="post.html">Kave</a></h2>
                        <div class="art-list-time">1 jam lalu</div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! &hellip;</p>
                </li>
            </ul>
        </div>
    </div>
<?php // this will be sent out if the post is not available:
    else:
        $error .= "<br />Cannot fetch post: ".$db->lastErrorMsg();
    endif;
?>
<!-- end of view -->
<?php 
elseif($method == "delete"): 
    $statement = $db->prepare("DELETE FROM ".Database::$table_post." WHERE id=:id");
    $statement->bindValue(":id", $id);

    if($statement->execute()) {
        $delete = "Delete success";
    } else {
        $error .= "<br/>Delete error: ".$db->lastErrorMsg();
    }
?>
<?php endif; ?>
</article><!-- end of content -->

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Asisten IF3110 /
        <a class="rss-link" href="#rss">RSS</a> /
        <br />
        <a class="twitter-link" href="http://twitter.com/YoGiiSinaga">Yogi</a> /
        <a class="twitter-link" href="http://twitter.com/sonnylazuardi">Sonny</a> /
        <a class="twitter-link" href="http://twitter.com/fathanpranaya">Fathan</a> /
        <br />
        <a class="twitter-link" href="#">Renusa</a> /
        <a class="twitter-link" href="#">Kelvin</a> /
        <a class="twitter-link" href="#">Yanuar</a> /
    </aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/fittext.js"></script>

</body>
</html>
<?php
    $pageContents = ob_get_contents();
    ob_end_clean();

    if(isset($pageTitle)) {
        echo str_replace("<!--TITLE-->", $pageTitle, $pageContents);
    } else if(isset($delete)) {
        echo str_replace("<!--TITLE-->", "Delete Success", $pageContents);
    } else {
        echo str_replace("<!--TITLE-->", "Error", $pageContents);
    }
?>