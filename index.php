<?php require "header.php"; ?>
<?php
  require "db_handler.php";
  $posts = getPosts();
?>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Tirta<span>-</span>Wening<span>-</span>Rachman</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
            <?php foreach($posts as $post) : ?>
            <li class='art-list-item' id='<?=$post['post_id'];?>'>
                <div class='art-list-item-title-and-time'>
                    <h2 class='art-list-title'><a href='post.php?post_id=<?=$post['post_id'];?>' ><?=$post['post_title'];?></a></h2>
                    <div class="art-list-time"><?=$post['post_date'];?></div>
                    <div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>
                </div>
                <p><?=$post['post_content'];?></p>
                <p>
                  <a href="edit_post.php?post_id=<?=$post['post_id'];?>">Edit</a> | <a onclick="hapusPost(<?=$post['post_id'];?>)">Hapus</a>
                  



                </p>
            </li>
            <?php endforeach; ?>
          </ul>
        </nav>
    </div>
</div>




<?php require "footer.php"; ?>

</div>

</body>


<script type="text/javascript">
  function hapusPost(hea){
    if (confirm("Apakah Anda yakin menghapus post ini?")){
      window.location.href = "del_post.php?post_id=".concat(hea);
      
    }
  }
</script>


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

</html>