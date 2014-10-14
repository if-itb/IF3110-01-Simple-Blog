<?php
// post_edit.php
include 'mysql.php';
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

<title>Simple Blog | Edit Post</title>
</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<?php
if(!empty($_POST)) {
    if(mysql_safe_query('UPDATE posts SET title=%s, body=%s, date=%s WHERE id=%s', $_POST['title'], $_POST['body'], time(), $_GET['id']))
        redirect('index.php');
    else
        echo mysql_error();
}

$result = mysql_safe_query('SELECT * FROM posts WHERE id=%s', $_GET['id']);

if(!mysql_num_rows($result)) {
    echo 'Post #'.$_GET['id'].' not found';
    exit;
}

$row = mysql_fetch_assoc($result);
?>

<?php echo <<<HTML
<article class="art simple post">
    <h2 class="art-title" style="margin-bottom:40px">-</h2>
    <div class="art-body">
        <div class="art-body-inner">
            <h2>Edit Post</h2>
            <div id="contact-area">
                <form method="post" action="#">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="title" id="title" value="{$row['title']}">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="date" id="date" value="{$row['date']}">
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="body" rows="20" cols="20" id="body" value="{$row['body']}"></textarea>

                    <input type="submit" value="Save" class="submit-button">
                </form>
            </div>
        </div>
    </div>
</article>
HTML;
?>