<?php
    include 'sql_my.php';
    if (isset($_GET['id'])) {
        $id = +$_GET['id'];

        $mysqli = new mysqli("localhost", "WBD_USER", "QKC3zwhJ", "WBD_DB");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            die();
        }

        if (!($result = $mysqli->query("SELECT * FROM `post` WHERE `ID` = ".$id))) {
            echo "Query failed: (" . $mysqli->errno . ") " > $mysqli->error;
            die();
        }

        $row = $result->fetch_row();
    } else {
        echo '<p>Wrong post</p>';
        die();
    }
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

<link rel="stylesheet" type="text/css" href="assets/css/my.css" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Simple Blog | Apa itu Simple Blog?</title>


</head>

<body onload="get_comments();">

<a id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
<a href="new_post.php">+ Tambah Post</a>
<div id="result-area"></div>
<?php
    echo '<h2 class="art-title">' . htmlspecialchars($row[1]) . '</h2>
        <h3>' . date_sql2my0($row[2]) . '</h3>';
    if (+$row[4] == 1)
        echo '<hr class="featured-article" />';
    else
        echo '<hr />';

    echo '<p>'.htmlspecialchars($row[3]).'</p>';
?>
<hr />

<h2>Komentar</h2>

<div id="contact-area">
    <form>
        <label for="Nama">Nama:</label>
        <input type="hidden" id="id-post" value=<?php echo $id ?>>
        <input type="text" name="Nama" id="Nama">

        <label for="Email">Email:</label>
        <input type="text" name="Email" id="Email" onchange="check_email();">
        <span id="error-area" style="color: red"></span>
        <br />

        <label for="Komentar">Komentar:</label><br>
        <textarea name="Komentar" rows="10" cols="80" id="Komentar"></textarea>

        <br><input type="submit" id="submit-button" onclick="return submit_post();">
    </form>
</div>

<ul id="comments-section"></ul>

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

<script type="text/javascript" src="assets/js/helper.js"></script>
<script type="text/javascript">
    function check_email() {
        var email = document.getElementById("Email");
        var error_area = document.getElementById("error-area");
        if (!isValidEmail(email.value)) {
            error_area.innerHTML = "Email tidak valid";
        } else {
            error_area.innerHTML = "";
        }
    }

    function submit_post() {
        var id_tag = document.getElementById("id-post");
        var name_tag = document.getElementById("Nama");
        var email_tag = document.getElementById("Email");
        var content_tag = document.getElementById("Komentar");

        var id_v = id_tag.value;
        var name_v = name_tag.value;
        var email_v = email_tag.value;
        var content_v = content_tag.value;

        name_tag.value = "";
        email_tag.value = "";
        content_tag.value = "";

        var to_send = {postID: id_v, name: name_v, email: email_v, content: content_v};

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                if (xmlhttp.responseText === "SUCCESS") {
                    get_comments();
                }
            }
        }

        xmlhttp.open("POST", "update_comment.php",true);
        xmlhttp.setRequestHeader("Content-Type", "application/json");

        xmlhttp.send(JSON.stringify(to_send));


        return false;
    }

    function get_comments() {
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                document.getElementById('comments-section').innerHTML = xmlhttp.responseText;
            }
        }

        var getter = "get_comment.php?id=";
        getter = getter.concat(document.getElementById("id-post").value);
        xmlhttp.open("GET", getter, true);
        xmlhttp.send();
    }
</script>

</body>
</html>