<?php
    include 'sql_my.php';
    if (isset($_GET['id'])) {
        $mysqli = new mysqli("localhost", "WBD_USER", "QKC3zwhJ", "WBD_DB");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            die();
        }

        if (!($result = $mysqli->query("SELECT * FROM `post` WHERE `ID` = ".$_GET['id']))) {
            echo "Query failed: (" . $mysqli->errno . ") " > $mysqli->error;
            die();
        }

        $row = $result->fetch_row();
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

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Simple Blog | Tambah Post</title>


</head>

<body class="default" onload="validate_date(<?php echo isset($row) ? 1 : 2 ?>);">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="simple post">
    <h2 class="art-title">&phi;</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>Tambah Post</h2>

            <div id="contact-area">
                <form method="post" action="update_table.php">
                    <label for="Judul">Judul:</label>
                    <input type="hidden" name="ID_post"
value="<?php
    if (isset($row)) {
        echo $row[0]. "\">";
        echo '<input type="text" name="Judul" id="Judul" value="'.htmlspecialchars($row[1]).'">';
        echo '<label for="Tanggal">Tanggal:</label>';
        echo '<input type="text" name="Tanggal" id="Tanggal" onchange="validate_date(1);" value="'.date_sql2my($row[2]).'">';
        echo '<p id="error_msg" style="text-align:center; color:red"></p>';
        echo '<label for="Konten">Konten:</label><br>';
        echo '<textarea name="Konten" rows="20" cols="20" id="Konten">'.htmlspecialchars($row[3]).'</textarea>';
        echo '<label for="isFeatured">Featured: </label><br>';
        echo '<input style="width: auto" type="checkbox" name="isFeatured" value=1';
        if (+$row[4])
            echo ' checked>';
        else
            echo '>';

    } else {
        echo "null\">";
        echo '<input type="text" name="Judul" id="Judul">';
        echo '<label for="Tanggal">Tanggal:</label>';
        echo '<input type="text" name="Tanggal" id="Tanggal" onchange="validate_date(0);">';
        echo '<p id="error_msg" style="text-align:center; color:red"></p>';
        echo '<label for="Konten">Konten:</label><br>';
        echo '<textarea name="Konten" rows="20" cols="20" id="Konten"></textarea>';
        echo '<label for="isFeatured">Featured: </label><br>';
        echo '<input style="width: auto" type="checkbox" name="isFeatured" value=1>';
    }
?>
                    <br>

                    <div id="submit-place"></div>
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

<script type="text/javascript" src="assets/js/helper.js"></script>
<script type="text/javascript">
    function submit_button() {
        var post_date = document.getElementById("Tanggal");
        var res = isValidDate(post_date.value);
        enable_submit((res === 0) || (res === 2));
    }
    function enable_submit(val) {
        var submit_place = document.getElementById("submit-place");

        if (val) {
            submit_place.innerHTML = '<input type="submit" name="submit" value="Simpan" class="submit-button">';
        } else {
            submit_place.innerHTML = '<input type="submit" name="submit" value="Simpan" class="submit-button" disabled>';
        }
    }
    function validate_date(arg) {
        var post_date = document.getElementById("Tanggal");
        var result = isValidDate(post_date.value);

        var error_msg = document.getElementById("error_msg");
        var enabled = false;
        switch (result) {
            case 0:
                error_msg.innerHTML = type0_msg;
                enabled = true;
                break;
            case 1:
                if (arg === 2) {
                    error_msg.innerHTML = type0_msg;
                } else {
                    error_msg.innerHTML = type1_msg;
                }
                break;
            case 2:
                if (arg === 1) {
                    error_msg.innerHTML = type0_msg;
                    enabled = true;
                } else if (arg === 2) {
                    error_msg.innerHTML = type0_msg;
                } else {
                    error_msg.innerHTML = type2_msg;
                }
                break;
            case 3:
                if (arg === 2) {
                    error_msg.innerHTML = type0_msg;
                } else {
                    error_msg.innerHTML = type3_msg;
                }
                break;
            default:
                error_msg.innerHTML = typed_msg;
        }

        enable_submit(enabled);
    }
</script>
</html>