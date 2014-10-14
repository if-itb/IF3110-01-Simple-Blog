<?php
	require('config/configuration.php');
	require('include/header.php');
	$id = $_GET["id"];
	$data = mysql_query("select * from post where id='$id' ");
	$hasil = mysql_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>

</head>

<body class="default">
<div class="wrapper">

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <?php if(isset($_GET['msg'])){ ?>
                <div class="valid_box">
                    <?php echo  "<h7>"."<center>".$_GET['msg']."</center>" ."</h7>"; ?>
                </div>
            <?php }?>
            <h2>Edit Post</h2>

            <div id="contact-area">
                <form method="post" action="action/do_edit_post.php?user_option=edit&id=<?php echo$hasil['id']?>">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="judul" id="judul" placeholder= "<?php echo $hasil['judul']; ?>">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="date" name="tanggal" id="tanggal" onchange="dateValidation()" value= "<?php echo $hasil['tanggal']; ?>">
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="konten" rows="20" cols="20" id="konten" disabled><?php echo $hasil['konten']; ?></textarea>

                    <button type="submit" value="Submit">Submit</button>
                    <button type="reset" value="Reset">Reset</button>
                </form>
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