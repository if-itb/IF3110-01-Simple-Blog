<?php 
/******************************************************************************************
 * TUBES 1 WBD
 * ------------
 * NAMA		:	Andre Susanto
 * NIM		:	135 12 028
 ******************************************************************************************/

require_once 'config.php';

if (($delete = req_handler('delete')) != ""){
	if (db_execute("DELETE FROM `post` WHERE `id_post`='$delete';")) $delOK = 1;
}
?>
<!DOCTYPE html>
<html>
<head>
<base href="<?php echo $systemurl; ?>">

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

<title>Simple Blog</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href=""><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new">+ Tambah Post</a></li>
    </ul>
</nav>

<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
          <?php if (isset($delOK)) { ?><font color="green">Post berhasil dihapus!</font> <?php } 
          
          	$konten = db_fetchs("SELECT * FROM `post` ORDER BY `stamp` DESC;");
          	for ($i = 1; $i <= $konten[0]; $i++){
          ?>
            <li class="art-list-item">
                <div class="art-list-item-title-and-time">
                    <h2 class="art-list-title"><a href="read/<?php echo $konten[$i]['id_post']; ?>/<?php echo str_replace(' ','-',$konten[$i]['judul']); ?>"><?php echo $konten[$i]['judul']; ?></a></h2>
                    <div class="art-list-time"><?php echo date("j F Y",strtotime($konten[$i]['stamp'])); ?></div>
                    <!-- <div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div> -->
                </div>
                <p><?php echo substr(strip_tags($konten[$i]['konten']), 0, 200); ?></p>
                <p>
                  <a href="edit/<?php echo $konten[$i]['id_post']; ?>">Edit</a> | <a href="javascript:void(0);" onclick="if (confirm('Apa anda yakin menghapus post ini?')) window.location='delete/<?php echo $konten[$i]['id_post']; ?>';">Hapus</a>
                </p>
            </li>
		<?php }

			if ($konten[0] == 0) {?>
			<li class="art-list-item">
                <p>Maaf, belum ada post di blog ini.</p>
                
            </li>
			<?php } ?>
          </ul>
        </nav>
    </div>
</div>

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