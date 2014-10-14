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
<link rel="shortcut icon" type="image/x-icon" href="images/t.png">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php
    include 'mysql.php';
    $PostID = $_GET['PostID'];
    $result = mysql_safe_query ('SELECT * FROM post WHERE PostID=%s LIMIT 1', $_GET['PostID']);

    if(!mysql_num_rows($result)) {
    echo 'Post #'.$_GET['PostID'].' not found';
    exit;
    }

    $row = mysql_fetch_assoc($result);

?>
<title>TeBonBon Blog | <?php echo ''.$row['Title'].''?> </title>


</head>
<script type="text/javascript" src="komentar.js"> </script>

<body class="default" onload="showComment(<?php echo $PostID; ?>); return false;">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>TeBonBon<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Add Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <?php
                echo '<time class="art-time">'.$row['Date'].'</time>';
                echo '<h2 class="art-title">'.$row['Title'].'</h2>';
                echo '<p class="art-subtitle"></p>';
            ?>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <?php
            echo '<p>'.$row['Content'].'</p>';

            ?>
            <hr />
            
            <h2>Comment</h2>
            
            
            <div id="contact-area">
                <form method="post" id="comment-form" onsubmit="addComment(<?php echo $PostID;?>); return false;">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name">
        
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email">
                    
                    <label for="content">Comments:</label><br>
                    <textarea name="content" rows="20" cols="20" id="content"></textarea>

                    <input type="submit" name="submit" value="submit" class="submit-button">
                </form>
            </div>
            
            <ul class="art-list-body" id="comment">
                
            </ul>
        </div>
    </div>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">Teofebano 13512050</div>
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

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>
<script>
function addComment(id) {
    var xmlhttp;
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var content = document.getElementById('content').value;
    
    
    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    if (name && email && content) {

        if (validate(email)) {
            alert("Your comment has been posted");
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    if (!(xmlhttp.responseText.localeCompare("sent"))) {
                        
                    }
                    document.getElementById("comment-form").reset();
                    showComment(id);
                }
                
            }
            xmlhttp.open("POST","acomment.php?",true);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlhttp.send("id="+id+"&name="+name+"&email="+email+"&content="+content);
        }
        else{
            alert("Your email is not valid!!!");
        }
    }
}

function validate(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function showComment(id) {
    var xmlhttp;
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("comment").innerHTML=xmlhttp.responseText;
        }
    }
    
    xmlhttp.open("POST","scomment.php?",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("id="+id);
}

function deleteComment(comid){
    var xmlhttp;
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("comment").innerHTML=xmlhttp.responseText;
        }
    }
    
    xmlhttp.open("POST","dcomment.php?",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("comid="+comid);
}
</script>


</body>
</html>