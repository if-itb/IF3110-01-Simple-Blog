<?php ob_start();
require_once dirname(__FILE__)."/assets/db/db_connection.php";

function curPageURL() {
    $pageURL = 'http';
    if (isset($_SERVER["HTTPS"])) {
        if($_SERVER["HTTPS"] == "on")
            $pageURL .= "s";
    }
    $pageURL .= "://";

    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

$db = Database::getInstance()->getHandle();

static $edit = true;
static $output, $pageTitle;

if(isset($_GET['id'])) {
    if(isset($_POST['judul']) && isset($_POST['tanggal']) && isset($_POST['konten'])) {
        $edit = false;

        $judul = $db->escapeString($_POST['judul']);
        $tanggal = $db->escapeString($_POST['tanggal']);
        $konten = $db->escapeString($_POST['konten']);
        $id = $db->escapeString($_GET['id']); // TODO: ganti jadi POST

        $query = "UPDATE ".Database::$table_post." SET judul=:judul, tanggal=:tanggal, konten=:konten WHERE id=:id";
        $stmt = $db->prepare($query);

        $stmt->bindValue(':judul', $judul, SQLITE3_TEXT);
        $stmt->bindValue(':tanggal', $tanggal);
        $stmt->bindValue(':konten', $konten, SQLITE3_TEXT);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

        $res = $stmt->execute();
        if($res) {
            $output = "Edit Post berhasil!";
            $pageTitle = "Berhasil";
        } else {
            $output = "Edit Post gagal! ".$db->lastErrorMsg();
            $pageTitle = "Error";
        }
    } else {
        // Edit
        static $post;
        $pageTitle = "Edit Post";

        $id = $db->escapeString($_GET['id']); // TODO: ganti jadi POST

        $table = Database::$table_post;
        $query = "SELECT * FROM $table WHERE id=:id";

        $stmt = $db->prepare($query);

        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $post = $stmt->execute();

        if($post) {
            $post = $post->fetchArray();
        } else {
            $output = "Edit post error";
            $edit = false;
            $pageTitle = "Error";
        }
    }
} else {
    // commit new post
    if(isset($_POST['judul']) && isset($_POST['tanggal']) && isset($_POST['konten'])) {
        $edit = false;

        $judul = $db->escapeString($_POST['judul']);
        $tanggal = $db->escapeString($_POST['tanggal']);
        $konten = $db->escapeString($_POST['konten']);

        $query = "INSERT INTO ".Database::$table_post." (judul, tanggal, konten) VALUES (:judul, :tanggal, :konten)";
        $stmt = $db->prepare($query);

        $stmt->bindValue(':judul', $judul, SQLITE3_TEXT);
        $stmt->bindValue(':tanggal', $tanggal);
        $stmt->bindValue(':konten', $konten, SQLITE3_TEXT);

        $result = $stmt->execute();
        if($result) {
            $output = "Post berhasil";
            $pageTitle = "Berhasil";
        } else {
            $output = "Post gagal ".$db->lastErrorMsg();
            $pageTitle = "Error";
        }
    } else {
        $pageTitle = "Tambah Post";
    }
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

<title>Simple Blog | <!--TITLE--></title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="#">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2 style="margin-top:1em"><!--TITLE--></h2>
            <?php if($edit): ?>
            <div id="contact-area">
                <form method="post" action=<?php echo "\"".curPageURL()."\""; ?>>
                    <label for="Judul">Judul:</label>
                    <input type="text" name="judul" placeholder="Judul" id="Judul" <?php if(isset($post)) echo 'value="'.$post['judul'].'"';?> required/>

                    <label for="Tanggal">Tanggal:</label>
                    <input type="date" name="tanggal" placeholder="Tanggal" min=<?php echo '"'.date("Y-m-d").'"'; ?> id="Tanggal" <?php if(isset($post)) echo 'value="'.$post['tanggal'].'"';?> required/>
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="konten" placeholder="Tulis konten post di sini" rows="20" cols="20" id="Konten" required><?php if(isset($post)) echo $post['konten']; ?></textarea>

                    <input type="submit" name="submit" value="Simpan" class="submit-button" />
                </form>
            </div>
            <?php endif; ?>
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

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>

</body>
</html>
<?php
    $pageContents = ob_get_contents();
    ob_end_clean();

    if(isset($pageTitle)) {
        echo str_replace("<!--TITLE-->", $pageTitle, $pageContents);
    } else {
        echo str_replace("<!--TITLE-->", "Error", $pageContents);
    }
?>