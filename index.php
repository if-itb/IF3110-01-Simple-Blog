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

<script>
  function confirmDialog(){
    var box = confirm("Apakah anda yakin akan menghapus post ini?");
    if(box == true){
      return true;
    }
    else{
      return false;
    }
  }
</script>

<title>Simple Blog</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
          <?php
            $con=mysqli_connect("localhost", "root", "", "wbd");

            if(mysqli_connect_errno()){
              echo "failed to connect to mysql" . mysqli_connect_error();
            }
            $result = mysqli_query($con, "SELECT * FROM post") or die(mysql_error());

            while($record = mysqli_fetch_array($result)){
              echo '<li class="art-list-item">
                  <div class="art-list-item-title-and-time">
                      <h2 class="art-list-title">
                        <a href="post.php?post-id='.$record['id'].'">'.$record['title'].'</a>
                      </h2>
                      <div class="art-list-time">'.$record['date'].'</div>
                      <div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>
                  </div>
                  <p>'.$record['content'].' &hellip;</p>
                  <p>
                    <a href="new_post.php?post-id='.$record['id'].'">Edit</a>
                     | 
                    <a onclick="return confirmDialog()" href="delete.php?post-id='.$record['id'].'">Hapus</a>
                  </p>
              </li>';
            } 
            mysqli_close($con) ?>
          </ul>
        </nav>
    </div>
</div>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Gilang Julian S. / 13512045
    </aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>

</body>
</html>