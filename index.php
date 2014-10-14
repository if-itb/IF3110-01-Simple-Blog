<!DOCTYPE html>
<html>
<head>
<?php
    //session_start();
    include "config/configuration.php";
    require('include/header.php');
?>

<title>Simple Blog</title>


</head>

<body class="default">
<div class="wrapper">


<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
            <?php                                   
                if (!$link) {
                    die('Could not connect: ' . mysql_error());
                }
                //echo 'Connected successfully';
                $data = mysql_query("select * from post");
                while($row = mysql_fetch_array($data)) {                                    
            ?>
                <li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title">
                        <a href="post.php?id=<?php echo $row['id']?>"><?php echo $row['judul']?></a></h2>
                        <div class="art-list-time"><?php echo $row['tanggal']?></div>
                        <div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>
                    </div>
                    <p><?php echo $row['konten']?> &hellip;</p>
                    <p>
                         
                      <a id="loadedit" href="edit_post.php?id=<?php echo $row['id'];?>">Edit</a>
                      |
                      <a href="#" onclick="confirmation('<?php echo $row['id'];?>')">Hapus</a>
                    </p>
                </li>
            <?php 
                }
                mysql_close();
            ?>
          </ul>
        </nav>
    </div>
</div>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        <a class="rss-link" href="#rss">RSS</a>
        <br>
        Dikerjakan oleh:
        <a class="twitter-link" href="http://twitter.com/arinisirait">Arini Hasianna</a> / 13511082
        
    </aside>
</footer>

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

<script>
      $(document).ready(function() {       
         // initiate layout and plugins
         
         $("#loadedit").click(function(){                
            start=$("#start option:selected").val();
            end=$("#end option:selected").val();
            $.post("action/do_edit_post.php",{ startRange:start, endRange: end }, function(ajaxresult){
                $("#hasil").html(ajaxresult);               
            });
        });
      });
</script>
</body>
</html>