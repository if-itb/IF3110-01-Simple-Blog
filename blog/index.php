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

<title>Melvin's Blog</title>


</head>

<body class="default">
<?php
$con=mysqli_connect("localhost","root","","simpleblog");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM post");
?>

<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Melvin's<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>
<?php 
				while($row = mysqli_fetch_array($result)){
				?>
<div id="home">
    <div class="posts" >
        <nav class="art-list">
          <ul class="art-list-body">
            <li class="art-list-item">
                <div class="art-list-item-title-and-time">
                    <h2 class="art-list-title"> <?php echo "<a href='post.php?Id=".$row["Id_post"]."'> "; ?>
					<?php {
						  echo "<td>" . $row['Judul'] . "</td>";
						}?>
				</p></a></h2>
                    <div class="art-list-time"> <?php echo "<td>" . $row['Tanggal'] . "</td>"; ?></div>
                    <div class="art-list-time"><span style="color:#F40034;"></span></div>
                </div>
                <div id="box">
				<p>
				<?php 
						  echo "<td>" . $row['Konten'] . "</td>";
				?>
				</p>
				</div>
                <p> 
                <?php 
				echo "<a href='edit.php?Id=".$row["Id_post"]."'> Edit </a> |";
				echo "<button onclick='confirmDelete(".$row["Id_post"].")'> Delete </button>";
				?>
				</p>
            </li>

          </ul>
        </nav>
		<hr>
    </div>
</div>
<?php } ?>
<footer class="footer">
    <div class="back-to-top"><a href=""></a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi"></div>
    <aside class="offsite-links">

        
    </aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/validate.js"></script>
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