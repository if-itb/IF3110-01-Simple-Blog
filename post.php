<?php
    require('config/configuration.php');
    require('include/header.php');
    $id = $_GET["id"];
    $data = mysql_query("SELECT * from post WHERE id='$id' ORDER BY tanggal DESC");
    $hasil = mysql_fetch_array($data);
    $datakomen = mysql_query("SELECT * from komentar WHERE idterkait='$id' ORDER BY waktu DESC");
    
?>

<html>
<head>
<title>Post</title>
</head>

<body class="default">
<div class="wrapper">



<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?php echo $hasil['tanggal']; ?></time>
            <h2 class="art-title"><?php echo $hasil['judul']; ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <?php if(isset($_GET['msg'])){ ?>
                <div class="valid_box">
                    <?php echo  "<h7>"."<center>".$_GET['msg']."</center>" ."</h7>"; ?>
                </div>
            <?php }?>
            <hr class="featured-article" />
            <p><?php echo $hasil['konten']; ?></p>
            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form method="post" action="#" onsubmit="loadkomentar()">
                    <input type="hidden" name="id" id="id" value="<?php echo $id ;?>">

                    <label for="nama">Nama:</label>
                    <input type="text" name="nama" id="nama">
        
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" onchange="validateEmail()">
                    
                    <label for="komentar">Komentar:</label><br>
                    <textarea name="komentar" rows="20" cols="20" id="komentar" disabled></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>
            <div id="komen">
                <ul class="art-list-body">
                <?php
                    while ($hasilkomen = mysql_fetch_array($datakomen)) {                                    
                ?>
                    <li class="art-list-item" id="komen">
                        <div class="art-list-item-title-and-time">
                            <h2 class="art-list-title"><a href="#"><?php echo $hasilkomen['nama']; ?></a></h2>
                            <div class="art-list-time"><?php echo $hasilkomen['waktu']; ?></div>
                        </div>
                        <p><?php echo $hasilkomen['komentar']; ?> &hellip;</p>
                    </li>
                <?php 
                    }
                    mysql_close();
                ?>   
                </ul>
            </div>
            
        </div>
    </div>

</article>

<?php
    require('include/footer.php');
?>

</div>

<script type="text/javascript" src="assets/js/beberapascript.js"></script>
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